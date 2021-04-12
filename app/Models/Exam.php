<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    protected $fillable = [
        'semester_id',
        'grade_id'.
        'subject_id',
        'teacher_id',
        'time',
        'date',
        'num_question',
        'status'
    ];

    const STATUS = [
        'Test' => 0, // Thi thử
    ];

    //đề thi thuộc giáo viên nào
    public function teacher() {
        return $this->belongsTo(Teacher::class);
    }

    public function subject() {
        return $this->beLongsTo(Subject::class);
    }

    public function semester() {
        return $this->beLongsTo(Semester::class);
    }

    public function grade() {
        return $this->beLongsTo(Grade::class);
    }

    public function comments() {
        return $this->hasMany(Comment::class)->with('user');
    }

//    public function ctdethi(){
//        return $this->hasOne('App\CtDeThi','id_de', 'id_de');
//    }
}
