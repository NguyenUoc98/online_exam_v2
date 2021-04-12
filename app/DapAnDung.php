<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DapAnDung extends Model
{
    protected $table = "dapandung";
    protected $primaryKey = "id_dad";
    protected $guarded = [];

    public function cauhoi(){
    	return $this->beLongsTo('App\CauHoi','id_cauhoi', 'id_cauhoi');
    }
}
