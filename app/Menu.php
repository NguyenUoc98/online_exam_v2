<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
   protected $table = "menu";
    protected $primaryKey = "id_menu";
    protected $guarded = [];

    public function menucon(){
    	return $this->hasMany('App\CtMenu','id_menu', 'id_menu');
    }
}
