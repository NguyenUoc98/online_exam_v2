<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Rate extends Model
{
    protected $fillable = [
        'user_id',
        'exam_id',
        'content',
        'rating'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
