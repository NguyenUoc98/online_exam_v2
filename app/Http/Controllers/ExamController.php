<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use Illuminate\Http\Request;

class ExamController extends Controller
{
    public function show($id) {
        $exam = Exam::with(['grade', 'subject', 'semester'])->findOrFail($id);

        $otherExams = Exam::with(['grade', 'subject', 'semester'])
            ->where('semester_id', $exam->semester_id)->get()->except($exam->id);

        $comments = $exam->comments()->paginate(10);

        return view('exam.show', compact('exam', 'otherExams', 'comments'));
    }
}
