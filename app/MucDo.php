<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MucDo extends Model
{
    protected $table = "mucdo";
    protected $primaryKey = "id_mucdo";
    protected $guarded = [];
    public $timestamps = true;
    //mức độ có bn ch, App/CauHoi : App là namespace
    public function cauhoi(){
    	return $this->hasMany('App/CauHoi','id_mucdo', 'id_mucdo');
    }
}
