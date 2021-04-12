<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ctdethi extends Model
{
    protected $table = "ctdethi";
    protected $primaryKey = ["id_cauhoi", "id_de"];
   
    protected $guarded = [];


    public function cauhoi(){
    	return $this->hasMany('App\CauHoi','id_mh', 'id_mh');
    }

    public function dethi(){
    	return $this->hasMany('App\DeThi','id_de', 'id_de');
    }
}
