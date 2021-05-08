<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use App\Models\Rate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class RateController extends Controller
{
    public function store(Request $request, $id)
    {
        $validatedData = Validator::make($request->all(),
            [
                'content' => 'required',
                'rating'  => 'required|min:1|max:5'
            ],
            [
                'content.required' => 'Vui lòng nhập nội dung!',
                'rating.required'  => 'Vui lòng chọn số sao',
                'rating.min'       => 'Vui lòng chọn số sao',
                'rating.max'       => 'Vui lòng chọn số sao',
            ]
        );

        if ($validatedData->fails()) {
            return redirect()->back()->withErrors($validatedData);
        }

        if (Exam::findOrFail($id)) {
            $rating = new Rate();
            $rating->exam_id = $id;
            $rating->user_id = Auth::user()->id;
            $rating->content = $request->get('content');
            $rating->rating  = $request->get('rating');
            $rating->save();
        }

        return redirect()->back();
    }
}
