<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $fillable = [
        'name',
        'image',
        'address',
        'phone',
        'subject_id'
    ];

    public function exams() {
        return $this->hasMany(Exam::class);
    }

    public function taikhoan(){
        return $this->hasOne('App\TaiKhoan','id_tk','id_tk');
    }
}
