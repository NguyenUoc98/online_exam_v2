<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class taikhoan extends Model
{
    protected $table = "taikhoan";
    protected $primaryKey = "id_tk";
    protected $guarded = [];

    public function giaovien(){
    	return $this->hasOne('App\GiaoVien','id_gv','id_gv');
    }

    public function hocsinh(){
    	return $this->hasOne('App\HocSinh','id_hs','id_hs');
    }
}
