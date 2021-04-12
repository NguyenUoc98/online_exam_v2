<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KetQua extends Model
{
    protected $table = "ketqua";
    protected $primaryKey = "id_kq";
    protected $guarded = [];

     public function hocsinh(){
    	return $this->hasOne('App\HocSinh','id_hs','id_hs');
    }

    public function ketqua(){
    	return $this->beLongsTo('App\HocSinh','id_hs','id_hs');
    }

    public function dethi(){
    	return $this->hasMany('App\DeThi','id_de', 'id_de');
    }

}
