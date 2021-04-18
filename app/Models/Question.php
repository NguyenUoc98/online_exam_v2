<?php

namespace App\Models;

use App\Traits\FormLayoutTrait;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use FormLayoutTrait;

    /**
     * Set Formdield for Question Details
     */
    public function formFields()
    {
        return $this
            ->beginDiv('row')
                ->beginDiv('col-md-12')
                    ->field('question_belongsto_type_question_relationship', 3)
                    ->field('question_belongsto_level_relationship', 3)
                    ->field('question_belongsto_grade_relationship', 3)
                    ->field('question_belongsto_subject_relationship', 3)
                ->endDiv()
            ->endDiv()
            ->field('content', 12)
            ->beginDiv('row')
                ->beginDiv('col-md-12')
                    ->field('answer_a', 6)->field('answer_b', 6)
                    ->field('answer_d', 6)->field('answer_c', 6)
                ->endDiv()
            ->endDiv()
            ->get();
    }

    public function typeQuestion()
    {
        return $this->belongsTo(TypeQuestion::class);
    }

    public function correctAnswer()
    {
        return $this->hasOne(CorrectAnswer::class);
    }
}
