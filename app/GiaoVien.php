<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GiaoVien extends Model
{
    protected $table = "giaovien";
    protected $primaryKey = "id_gv";
    protected $guarded = [];
    public $timestamps = true;

    public function dethi(){
    	return $this->hasMany('App\DeThi','id_de', 'id_de');
    }

    public function taikhoan(){
    	return $this->hasOne('App\TaiKhoan','id_tk','id_tk');
    }
}
