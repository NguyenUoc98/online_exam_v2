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

    public function getPoint()
    {
        return $this->results->avg('score');
    }

    public function getRank()
    {
        $ranks = static::rankResults();
        return [
            'rank'  => array_search($this->id, array_column($ranks, 'user_id')) + 1,
            'total' => count($ranks)
        ];
    }

    public static function rankResults()
    {
        $array = static::get()->filter(function($user) {
            return $user->hasRole('user');
        })->map(function($user) {
            return ['user_id' => $user->id, 'point' => $user->getPoint()];
        })->toArray();

        usort($array, function($a, $b) {
            return $a['point'] <= $b['point'];
        });
        return $array;
    }
}
