<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
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
        'Thi thử' => 0, // Thi thử
    ];

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
        return $this->belongsToMany(Question::class)->with('typeQuestion');
    }
}
