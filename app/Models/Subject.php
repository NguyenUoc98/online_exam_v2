<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $fillable = [
        'name',
        'image'
    ];

    public function quetions() {
        return $this->hasMany(Question::class);
    }

    public function exams() {
        return $this->hasMany(Exam::class);
    }
}
