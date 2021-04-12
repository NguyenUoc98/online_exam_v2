<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Khoi extends Model
{
    protected $table = "khoi";
    protected $primaryKey = "id_khoi";
    protected $guarded = [];
    public $timestamps = true;


    public function cauhoi(){
    	return $this->hasMany('App\CauHoi','id_khoi', 'id_khoi');
    }

    public function dethi(){
    	return $this->hasMany('App\DeThi','id_de', 'id_de');
    }
}
