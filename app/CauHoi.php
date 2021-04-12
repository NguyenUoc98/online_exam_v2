<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CauHoi extends Model
{
    protected $table = "cauhoi";
    protected $primaryKey = "id_cauhoi";
    protected $guarded = [];
    public $timestamps = true;

    //câu hỏi thuộc loại nào, khóa phụ, khóa chính
    public function loaich(){
    	return $this->beLongsTo('App\LoaiCauHoi','id_loaich', 'id_loaich');
    }

    public function mucdo(){
    	return $this->beLongsTo('App\MucDo','id_mucdo', 'id_mucdo');
    }

    public function monthi(){
    	return $this->beLongsTo('App\MonThi','id_mh', 'id_mh');
    }

    public function khoi(){
    	return $this->beLongsTo('App\Khoi','id_khoi', 'id_khoi');
    }

     public function dapandung(){
    	return $this->hasMany('App\DapAnDung','id_cauhoi', 'id_cauhoi');
    }

    public function ctdethi(){
        return $this->beLongsTo('App\CtDeThi','id_cauhoi', 'id_cauhoi');
    }
}
