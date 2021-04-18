<?php

namespace App\Http\Livewire;

use App\Models\Semester;
use Livewire\Component;
use Livewire\WithPagination;

class SemesterExams extends Component
{
    use WithPagination;
    public $semester;

    public function mount($semester)
    {
        $this->semester = $semester;
    }

    public function paginationView()
    {
        return 'livewire.custom-paginate';
    }

    public function render()
    {
        $exams = $this->semester->exams()->paginate(5);
        return view('livewire.semester-exams')->with([
            'exams' => $exams
        ]);
    }
}
