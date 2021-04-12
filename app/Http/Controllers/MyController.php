<?php

namespace App\Http\Controllers; //đưỡng dẫn đến thư mục controller của bạn

use Illuminate\Http\Request; //khai báo sử dụng thư viện của laravel

class MyController extends Controller
{
    public function getController(){
    	echo 'hello myController';
    }

    public function thamsoController($stn, $sth){
    	$tong = $stn + $sth;
    	return $tong;
    }

//truyền dữ liệu sang view
    public function getView(){
    	$data['user'] = ['Vietpro', 'Admin', 'TrangLuong'];
    	return view('trangchu',$data); //phải truyền data chỗ này
    }

   
    public function getLoaicauhoi(){
    	return view('loaicauhoi');
    }

     
}
