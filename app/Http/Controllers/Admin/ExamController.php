<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Exam;
use App\Models\Question;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use TCG\Voyager\Database\Schema\SchemaManager;
use TCG\Voyager\Events\BreadDataAdded;
use TCG\Voyager\Facades\Voyager;
use TCG\Voyager\Http\Controllers\VoyagerBaseController;

class ExamController extends VoyagerBaseController
{
    //***************************************
    //               ____
    //              |  _ \
    //              | |_) |
    //              |  _ <
    //              | |_) |
    //              |____/
    //
    //      Browse our Data Type (B)READ
    //
    //****************************************

    public function index(Request $request)
    {
        // GET THE SLUG, ex. 'posts', 'pages', etc.
        $slug = $this->getSlug($request);

        // GET THE DataType based on the slug
        $dataType = Voyager::model('DataType')->where('slug', '=', $slug)->first();

        // Check permission
        $this->authorize('browse', app($dataType->model_name));

        $getter = $dataType->server_side ? 'paginate' : 'get';

        $search = (object)['value' => $request->get('s'), 'key' => $request->get('key'), 'filter' => $request->get('filter')];

        $search2 = [];
        if ($request->has('semester_id') && $request->get('semester_id')) {
            array_push($search2, ['semester_id', $request->get('semester_id')]);
        }
        if ($request->has('subject_id') && $request->get('subject_id')) {
            array_push($search2, ['subject_id', $request->get('subject_id')]);
        }
        if ($request->has('grade_id') && $request->get('grade_id')) {
            array_push($search2, ['grade_id', $request->get('grade_id')]);
        }
        if ($request->has('teacher_id') && $request->get('teacher_id')) {
            array_push($search2, ['teacher_id', $request->get('teacher_id')]);
        }

        $searchNames = [];
        if ($dataType->server_side) {
            $searchable = SchemaManager::describeTable(app($dataType->model_name)->getTable())->pluck('name')->toArray();
            $dataRow = Voyager::model('DataRow')->whereDataTypeId($dataType->id)->get();
            foreach ($searchable as $key => $value) {
                $field = $dataRow->where('field', $value)->first();
                $displayName = ucwords(str_replace('_', ' ', $value));
                if ($field !== null) {
                    $displayName = $field->getTranslatedAttribute('display_name');
                }
                $searchNames[$value] = $displayName;
            }
        }

        $orderBy = $request->get('order_by', $dataType->order_column);
        $sortOrder = $request->get('sort_order', $dataType->order_direction);
        $usesSoftDeletes = false;
        $showSoftDeleted = false;

        // Next Get or Paginate the actual content from the MODEL that corresponds to the slug DataType
        if (strlen($dataType->model_name) != 0) {
            $model = app($dataType->model_name);

            if ($dataType->scope && $dataType->scope != '' && method_exists($model, 'scope' . ucfirst($dataType->scope))) {
                $query = $model->{$dataType->scope}();
            } else {
                $query = $model::select('*');
            }

            // Use withTrashed() if model uses SoftDeletes and if toggle is selected
            if ($model && in_array(SoftDeletes::class, class_uses_recursive($model)) && Auth::user()->can('delete', app($dataType->model_name))) {
                $usesSoftDeletes = true;

                if ($request->get('showSoftDeleted')) {
                    $showSoftDeleted = true;
                    $query = $query->withTrashed();
                }
            }

            // If a column has a relationship associated with it, we do not want to show that field
            $this->removeRelationshipField($dataType, 'browse');

            if ($search->value != '' && $search->key && $search->filter) {
                $search_filter = ($search->filter == 'equals') ? '=' : 'LIKE';
                $search_value = ($search->filter == 'equals') ? $search->value : '%' . $search->value . '%';
                $query->where($search->key, $search_filter, $search_value);
            }

            if (count($search2)) {
                $query->where($search2);
            }

            if ($orderBy && in_array($orderBy, $dataType->fields())) {
                $querySortOrder = (!empty($sortOrder)) ? $sortOrder : 'desc';
                $dataTypeContent = call_user_func([
                    $query->orderBy($orderBy, $querySortOrder),
                    $getter,
                ]);
            } elseif ($model->timestamps) {
                $dataTypeContent = call_user_func([$query->latest($model::CREATED_AT), $getter]);
            } else {
                $dataTypeContent = call_user_func([$query->orderBy($model->getKeyName(), 'DESC'), $getter]);
            }

            // Replace relationships' keys for labels and create READ links if a slug is provided.
            $dataTypeContent = $this->resolveRelations($dataTypeContent, $dataType);
        } else {
            // If Model doesn't exist, get data from table name
            $dataTypeContent = call_user_func([DB::table($dataType->name), $getter]);
            $model = false;
        }

        // Check if BREAD is Translatable
        $isModelTranslatable = is_bread_translatable($model);

        // Eagerload Relations
        $this->eagerLoadRelations($dataTypeContent, $dataType, 'browse', $isModelTranslatable);

        // Check if server side pagination is enabled
        $isServerSide = isset($dataType->server_side) && $dataType->server_side;

        // Check if a default search key is set
        $defaultSearchKey = $dataType->default_search_key ?? null;

        // Actions
        $actions = [];
        if (!empty($dataTypeContent->first())) {
            foreach (Voyager::actions() as $action) {
                $action = new $action($dataType, $dataTypeContent->first());

                if ($action->shouldActionDisplayOnDataType()) {
                    $actions[] = $action;
                }
            }
        }

        // Define showCheckboxColumn
        $showCheckboxColumn = false;
        if (Auth::user()->can('delete', app($dataType->model_name))) {
            $showCheckboxColumn = true;
        } else {
            foreach ($actions as $action) {
                if (method_exists($action, 'massAction')) {
                    $showCheckboxColumn = true;
                }
            }
        }

        // Define orderColumn
        $orderColumn = [];
        if ($orderBy) {
            $index = $dataType->browseRows->where('field', $orderBy)->keys()->first() + ($showCheckboxColumn ? 1 : 0);
            $orderColumn = [[$index, $sortOrder ?? 'desc']];
        }

        $view = 'voyager::bread.browse';

        if (view()->exists("voyager::$slug.browse")) {
            $view = "voyager::$slug.browse";
        }


        return Voyager::view($view, compact(
            'actions',
            'dataType',
            'dataTypeContent',
            'isModelTranslatable',
            'search',
            'orderBy',
            'orderColumn',
            'sortOrder',
            'searchNames',
            'isServerSide',
            'defaultSearchKey',
            'usesSoftDeletes',
            'showSoftDeleted',
            'showCheckboxColumn'
        ));
    }

    /**
     * POST BRE(A)D - Store data.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'semester_id'  => 'required',
            'grade_id'     => 'required',
            'subject_id'   => 'required',
            'teacher_id'   => 'required',
            'time'         => 'required|numeric|min:5',
            'num_question' => 'required|numeric|min:10'
        ],
            [
                'semester_id.required'  => 'Chưa chọn kỳ thi',
                'grade_id.required'     => 'Chưa chọn môn thi',
                'subject_id.required'   => 'Chưa chọn khối',
                'teacher_id.required'   => 'Chưa chọn giáo viên',
                'time.required'         => 'Chưa nhập thời gian thi',
                'num_question.required' => 'Chưa nhập số câu hỏi',
                'num_question.min'      => 'Phải có ít nhất 10 câu hỏi',
                'time.min'              => 'Thời gian thi ít nhất 5 phút'
            ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Kiểm tra số lượng câu hỏi phù hợp
        $questions = Question::where([
            ['subject_id', $request->get('subject_id')],
            ['grade_id', $request->get('grade_id')]
        ]);

        $num_question = $questions->count();

        if ($num_question < $request->get('num_question')) {
            return redirect()->back()
                ->withErrors([
                    'num_question' => "Số lượng câu hỏi trong ngân hàng không đủ. Hiện tại có $num_question câu."
                ])
                ->withInput();
        }

        $slug = $this->getSlug($request);

        $dataType = Voyager::model('DataType')->where('slug', '=', $slug)->first();

        // Check permission
        $this->authorize('add', app($dataType->model_name));

        // Validate fields with ajax
        $val = $this->validateBread($request->all(), $dataType->addRows)->validate();
        $data = $this->insertUpdateData($request, $slug, $dataType->addRows, new $dataType->model_name());

        event(new BreadDataAdded($dataType, $data));

        if (!$request->has('_tagging')) {
            if ($request->get('type_create') != 'auto') {
                $redirect = redirect()->back();
            } else {
                $questions = $questions->get()->countBy('level_id');
                $redirect = view('voyager::exams.add-auto', compact('questions', 'data'));
            }

            return $redirect->with([
                'message'    => __('voyager::generic.successfully_added_new') . " {$dataType->getTranslatedAttribute('display_name_singular')}",
                'alert-type' => 'success',
            ]);
        } else {
            if ($request->get('type_create') != 'auto') {
                $questions = $questions->get()->groupBy('level_id');
                return view('voyager::exams.add-auto', compact('questions', 'data'));
            } else {
                return response()->json(['success' => true, 'data' => $data]);
            }
        }
    }

    /**
     * Order BREAD items.
     *
     * @param string $table
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function orderQuestion($id, Request $request)
    {
        $slug = $this->getSlug($request);

        // Check permission
        $this->authorize('edit', app(Exam::class));

        $model = app(Exam::class);
        if ($model && in_array(SoftDeletes::class, class_uses_recursive($model))) {
            $model = $model->withTrashed();
        }
        $results = $model->find($id)->questions;

        $view = 'voyager::bread.order';

        if (view()->exists("voyager::$slug.order")) {
            $view = "voyager::$slug.order";
        }

        return Voyager::view($view, compact('results', 'id'));
    }

    public function updateOrderQuestion($id, Request $request)
    {
        // Check permission
        $this->authorize('edit', app(Exam::class));

        $exam = Exam::findOrFail($id);

        $order = json_decode($request->input('order'));
        foreach ($order as $key => $item) {
            $exam->questions()->updateExistingPivot($item->id, ['order' => ($key + 1)]);
        }
    }

    public function createAuto($id, Request $request)
    {
        // Kiểm tra số lượng câu hỏi
        $exam = Exam::find($id);
        $request = $request->except('_token');
        if (array_sum($request) != $exam->num_question) {
            $exam->delete();
            return redirect()->back()->with([
                'message'    => "Số lượng câu không phù hợp",
                'alert-type' => 'error',
            ]);
        }

        $questions = Question::where([
            ['subject_id', $exam->subject_id],
            ['grade_id', $exam->grade_id]
        ])->get(['level_id', 'id'])->groupBy('level_id');

        $arrayQuestionId = [];

        foreach ($request as $level=>$numQuestion) {
            $temp = $questions[$level]->random($numQuestion)->map(function($value) {
                return $value->id;
            })->toArray();
            $arrayQuestionId = array_merge($arrayQuestionId, $temp);
        }
        $exam->questions()->attach($arrayQuestionId);
        return redirect()->back()->with([
            'message'    => "Tạo thành công mã đề $exam->id",
            'alert-type' => 'success',
        ]);
    }
}
