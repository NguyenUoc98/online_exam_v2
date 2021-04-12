<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LoaiCauHoi extends Model
{
    protected $table = "loaicauhoi";
    protected $primaryKey = "id_loaich";
    protected $guarded = []; //tất cả các trường dlieu ko đc bảo về, phải tự thao tác

    //loại câu hỏi có bn câu hỏi
    public function cauhoi(){
    	return $this->hasMany('App\CauHoi','id_loaich', 'id_loaich');
    }
}
