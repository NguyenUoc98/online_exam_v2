<?php

namespace App\Models;

use App\Traits\FormLayoutTrait;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    const TYPE = [
        'an_option'   => 1,
        'many_option' => 2
    ];

    use FormLayoutTrait;

    /**
     * Set Formdield for Question Details
     */
    public function formFields()
    {
        return $this
            ->field('question_belongsto_level_relationship', 3)
            ->field('question_belongsto_grade_relationship', 3)
            ->field('question_belongsto_subject_relationship', 3)
            ->field('type_question_id', 3)
            ->field('content', 12)
            ->get();
    }

    public function answers()
    {
        return $this->hasMany(Answer::class);
    }

}
