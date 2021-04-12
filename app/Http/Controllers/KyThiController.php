<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\KyThi;

class KyThiController extends Controller
{
    public function getKythi(){
    	$kythi = KyThi::all();
    	return view('admin.kythi.dskythi',['kythi'=>$kythi]);
    }

    public function getKythihome(){
    	$kythi = KyThi::all();
    	return view('admin.layout.trangchu',['kythi'=>$kythi]);
    }
}
