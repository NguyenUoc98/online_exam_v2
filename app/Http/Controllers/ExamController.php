<?php

namespace App\Http\Controllers;

use App\DeThi;
use App\Models\Exam;
use App\Models\Result;
use App\Models\UserAnswer;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ExamController extends Controller
{
    public function show($id)
    {
        $exam = Exam::with(['grade', 'subject', 'semester'])->findOrFail($id);

        $otherExams = Exam::with(['grade', 'subject', 'semester'])
            ->where('semester_id', $exam->semester_id)->get()->except($exam->id);

        $comments = $exam->comments()->paginate(10);
        $rates = $exam->rates();
        $totalRate = $rates->count();
        $rating = $rates->get()->countBy('rating')
            ->map(function ($value) use ($totalRate) {
                return $value * 100 / $totalRate;
            });

        $rateAble = $rates->get()->where('user_id', auth()->id())->count() ? false : true;

        if($rateAble && Auth::check()) {
            $lastResult = auth()->user()->results()->where('exam_id', $id)->orderBy('created_at', 'desc')->first();
            if (!$lastResult) {
                $rateAble = false;
            }
        } else {
            $rateAble = false;
        }

        return view('exam.show', compact('exam', 'otherExams', 'comments', 'rates', 'rating', 'totalRate', 'rateAble'));
    }

    /**
     * Tham gia thi
     *
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function doing($id)
    {
        // Check xem đã làm đề này chưa
        // Qua 30 phút mới được làm lại
        $lastResult = auth()->user()->results()->where('exam_id', $id)->orderBy('created_at', 'desc')->first();
        if ($lastResult) {
            if ($lastResult->created_at->diffInMinutes(Carbon::now()) < 30) {
                return redirect()->back()->with([
                    'notify' => [
                        'title' => 'Lỗi khi tham gia thi',
                        'msg'   => 'Bạn vừa làm đề thi này, hãy đợi 30 phút để tiếp tục!',
                        'icon'  => 'error'
                    ]
                ]);
            }
        }

        auth()->user()->examsWithAnswer()->detach($id);

        $exam = Exam::with(['semester:id,name', 'subject:id,name'])->findOrFail($id);
        $questions = $exam->questions()->paginate(1);
        return view('exam.doing', compact('exam', 'questions'));
    }

    /**
     * Tạo kết quả thi
     *
     * @param $exam_id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function saveResult(Request $request)
    {
        $exam_id = $request->get('exam_id');
        $exam = Exam::with(['semester:id,name', 'subject:id,name'])->findOrFail($exam_id);
        $correctAnswer = $exam->questions()
            ->with([
                'answers' => function ($q) {
                    return $q->where('is_correct', 1);
                }])
            ->get()
            ->mapWithKeys(function ($value) {
                return [$value->id => $value->answers->first()->id];
            });

        $userAnswer = UserAnswer::where([
            ['exam_id', $exam_id],
            ['user_id', auth()->id()]
        ])->get()->mapWithKeys(function ($value) {
            return [$value->question_id => $value->answer_selected];
        });

        $totalQuestion = $correctAnswer->count();
        $numCorrect = $totalQuestion - $correctAnswer->diffAssoc($userAnswer)->count();
        $point = round(($numCorrect * 10) / $totalQuestion, 2);

        // Xếp loại (Mặc định là Yếu)
        $academic_power = 0;
        foreach (Result::ACADEMIC_POWER as $key => $item) {
            if ($point > $item['min'] && $point <= $item['max']) {
                $academic_power = $key;
                break;
            }
        }

        auth()->user()->results()->create([
            'exam_id'        => $exam_id,
            'num_correct'    => $numCorrect,
            'score'          => $point,
            'academic_power' => $academic_power
        ]);

        return redirect()->route('exam.get-result', $exam_id);
    }

    public function getResult($exam_id)
    {
        $exam = Exam::findOrFail($exam_id);
        $userAnswer = UserAnswer::where([
            ['exam_id', $exam_id],
            ['user_id', auth()->id()]
        ])->get()->mapWithKeys(function ($value) {
            return [$value->question_id => $value->answer_selected];
        });
        $result = $exam->results()->first();
        return view('exam.result', compact('result', 'exam', 'userAnswer'));
    }
}
