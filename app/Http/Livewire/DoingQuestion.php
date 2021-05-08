<?php

namespace App\Http\Livewire;

use App\Models\UserAnswer;
use Livewire\Component;
use Livewire\WithPagination;

class DoingQuestion extends Component
{
    use WithPagination;

    public $exam;

    protected $listeners = ['selectAnswer'];

    public function mount($exam)
    {
        $this->exam = $exam;
    }

    public function paginationView()
    {
        return 'livewire.custom-paginate';
    }

    public function selectAnswer($questionId, $answer = '')
    {
        $userAnswer = UserAnswer::where([
            ['user_id', auth()->id()],
            ['exam_id', $this->exam->id],
            ['question_id', $questionId]
        ])->first();

        if ($userAnswer) {
            $userAnswer->update(
                ['answer_selected' => $answer]
            );
        } else {
            UserAnswer::create([
                'user_id'         => auth()->id(),
                'exam_id'         => $this->exam->id,
                'question_id'     => $questionId,
                'answer_selected' => $answer
            ]);
        }
    }

    public function render()
    {
        $questions = $this->exam->questions()->paginate(1);
        return view('livewire.doing-question')->with([
            'questions' => $questions
        ]);
    }
}
