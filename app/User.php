<?php

namespace App;

use App\Models\Exam;
use App\Models\Result;
use App\Models\UserAnswer;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends \TCG\Voyager\Models\User
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'avatar',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function answer ($examId, $questionId) {
        return $this->hasMany(UserAnswer::class)->where('exam_id', $examId)->where('question_id', $questionId);
    }

    /**
     * Lấy lịch sử thi
     */
    public function results()
    {
        return $this->hasMany(Result::class);
    }

    public function examsWithAnswer()
    {
        return $this->belongsToMany(Exam::class, 'user_answers');
    }
}
