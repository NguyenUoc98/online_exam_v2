<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Semester extends Model
{
    protected $fillable = [
        'name',
        'slug'
    ];

    public function exams() {
        return $this->hasMany(Exam::class)->with('subject');
    }
}
