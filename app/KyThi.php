<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KyThi extends Model
{
    protected $table = "kythi";
    protected $primaryKey = "id_ky";
    protected $guarded = [];
    public $timestamps = true;

    public function dethi(){
    	return $this->hasMany('App\DeThi','id_de', 'id_de');
    }
}
