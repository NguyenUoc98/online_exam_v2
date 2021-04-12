<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HocSinh extends Model
{
    protected $table = "hocsinh";
    protected $primaryKey = "id_hs";
    protected $guarded = [];

    public function taikhoan(){
    	return $this->hasOne('App\TaiKhoan','id_tk','id_tk');
    }

    public function ketqua(){
    	return $this->hasMany('App\KetQua','id_kq', 'id_kq');
    }
}
