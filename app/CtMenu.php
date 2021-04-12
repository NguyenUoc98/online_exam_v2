<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CtMenu extends Model
{
    protected $table = "menucon";
    protected $primaryKey = 'id_menucon';
   
    protected $guarded = [];
   

   public function menu(){
    	return $this->beLongsTo('App\Menu','id_menu', 'id_menu');
    }
}
