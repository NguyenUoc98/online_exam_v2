<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    protected $fillable = [
        'name'
    ];

    public function questions() {
        return $this->hasMany(Question::class);
    }

    public function exams() {
        return $this->hasMany(Exam::class);
    }
}
