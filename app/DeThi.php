<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DeThi extends Model
{
    protected $table = "dethi";
    protected $primaryKey = "id_de";
    protected $guarded = [];
     //public $timestamps = true;
    //đề thi thuộc giáo viên nào
    public function giaovien(){
    	return $this->belongsTo('App\GiaoVien','id_gv','id_gv');
    }

    public function monthi(){
    	return $this->beLongsTo('App\MonThi','id_mh', 'id_mh');
    }

    public function kythi(){
    	return $this->beLongsTo('App\KyThi','id_ky', 'id_ky');
    }

    public function khoi(){
    	return $this->beLongsTo('App\Khoi','id_khoi', 'id_khoi');
    }

    public function ctdethi(){
        return $this->hasOne('App\CtDeThi','id_de', 'id_de');
    }

}
