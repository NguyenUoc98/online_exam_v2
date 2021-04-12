<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ThaoLuanDeThi extends Model
{
     protected $table = "thaoluandethi";
    protected $primaryKey = "id_thaoluan";
    protected $guarded = [];

    public function user(){
    	return $this->beLongsTo('App\User','id', 'id');
    }

}
