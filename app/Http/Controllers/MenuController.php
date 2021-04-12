<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Menu;
use DB;

class MenuController extends Controller
{
     public function getmenu(){
    	 $menu = DB::table('menu')
       ->select('tenmenu','menu.id_menu')
       ->get()->toArray();

    	return view('admin.layout.index',['menu'=>$menu]);
    }
}
