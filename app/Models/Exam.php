<?php

namespace App\Models;

use App\Traits\FormLayoutTrait;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    use FormLayoutTrait;

    protected $fillable = [
        'semester_id',
        'grade_id' .
        'subject_id',
        'teacher_id',
        'time',
        'date',
        'num_question',
        'status'
    ];

    const STATUS = [
        'Đề thi thử'    => 0, // Thi thử
        'Đề chính thức' => 1
    ];

    /**
     * Set Formdield for Question Details
     */
    public function formFields()
    {
        return $this->field('exam_belongsto_semester_relationship', 3)
            ->field('exam_belongsto_subject_relationship', 3)
            ->field('exam_belongsto_grade_relationship', 3)
            ->field('exam_belongsto_teacher_relationship', 3)
            ->field('num_question', 3)
            ->field('time', 3)
            ->field('date', 3)
            ->field('status', 3)
            ->get();
    }

    //đề thi thuộc giáo viên nào
    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    public function semester()
    {
        return $this->belongsTo(Semester::class);
    }

    public function grade()
    {
        return $this->belongsTo(Grade::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class)->with('user');
    }

    public function questions()
    {
        return $this->belongsToMany(Question::class)->withPivot('order')->orderBy('order');
    }

    public function rates()
    {
        return $this->hasMany(Rate::class)->with('user');
    }
}
