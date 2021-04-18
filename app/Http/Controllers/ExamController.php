<?php

namespace App\Http\Controllers;

use App\DeThi;
use App\Models\Exam;
use App\Models\UserAnswer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ExamController extends Controller
{
    public function show($id)
    {
        $exam = Exam::with(['grade', 'subject', 'semester'])->findOrFail($id);

        $otherExams = Exam::with(['grade', 'subject', 'semester'])
            ->where('semester_id', $exam->semester_id)->get()->except($exam->id);

        $comments = $exam->comments()->paginate(10);

        return view('exam.show', compact('exam', 'otherExams', 'comments'));
    }

    /**
     * Tham gia thi
     *
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function doing($id)
    {
        $exam = Exam::with(['semester:id,name', 'subject:id,name'])->findOrFail($id);
        $questions = $exam->questions()->paginate(1);
        return view('exam.doing', compact('exam', 'questions'));
    }


    public function getResult($exam_id)
    {
        $exam = Exam::with(['semester:id,name', 'subject:id,name'])->findOrFail($exam_id);
        $correctAnswer = $exam->questions()->with('correctAnswer')->get()
            ->mapWithKeys(function ($value) {
                return [$value->id => $value->correctAnswer->correct_answer];
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

        return view('exam.result', compact('totalQuestion', 'numCorrect', 'point', 'exam'));
    }
}
