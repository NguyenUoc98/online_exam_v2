<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MonThi extends Model
{
    protected $table = "monthi";
    protected $primaryKey = "id_mh";
    protected $guarded = [];

    public function cauhoi(){
    	return $this->hasMany('App\CauHoi','id_mh', 'id_mh');
    }

    public function dethi(){
    	return $this->hasMany('App\DeThi','id_de', 'id_de');
    }
}
