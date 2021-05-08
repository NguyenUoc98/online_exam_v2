<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    protected $fillable = [
        'user_id',
        'exam_id',
        'num_correct',
        'score',
        'academic_power'
    ];

    const ACADEMIC_POWER = [
        '0' => [
            'name' => 'Yếu',
            'min'  => -1,
            'max'  => 5
        ],
        '1' => [
            'name' => 'Trung bình',
            'min'  => 5,
            'max'  => 7
        ],
        '2' => [
            'name' => 'Khá',
            'min'  => 7,
            'max'  => 8
        ],
        '3' => [
            'name' => 'Giỏi',
            'min'  => 8,
            'max'  => 10
        ]
    ];
}
