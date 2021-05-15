<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Exam;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CommentController extends Controller
{
    public function store(Request $request, $id) {
        $validatedData = Validator::make($request->all(),
            [
                'content'=> 'required'
            ],
            [
                'content.required' =>'Vui lòng nhập nội dung!'
            ]
        );

        if($validatedData->fails()) {
            return redirect()->back()->withErrors($validatedData);
        }

        if (Exam::findOrFail($id)) {
            $comment = new Comment();
            $comment->exam_id = $id;
            $comment->user_id = Auth::user()->id;
            $comment->content = $request->get('content');
            $comment->save();
        }

        return redirect()->back();
    }
}
