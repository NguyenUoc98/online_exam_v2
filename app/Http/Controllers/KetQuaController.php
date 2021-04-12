<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use PdfMerger;
use App\KetQua;
use App\KyThi;
use App\MonThi;
use DB;

class KetQuaController extends Controller
{
    public function ketquathi(){
    	$ketqua = DB::table('ketqua')
    	->join('hocsinh','hocsinh.id_hs','ketqua.id_hs')
    	->join('dethi','dethi.id_de','ketqua.id_de')
    	->join('monthi','monthi.id_mh','dethi.id_mh')
    	->join('kythi','kythi.id_ky','dethi.id_ky')->get()->toArray();
    	$diem = DB::table('ketqua')->pluck('diem');
    	// dd($diem[0]);
    	// $xeploai='';
    	// if($diem[0] <5){
    	// 	$xeploai = 'Yếu';
    	// }
    	// elseif($diem[0] >=5 && $diem[0] ==6){
    	// 	$xeploai = 'Trung bình';
    	// }
    	// elseif($diem[0] ==7 ){
    	// 	$xeploai = 'Khá';
    	// }
    	// elseif($diem[0] >=8 ){
    	// 	$xeploai = 'Giỏi';
    	// }
    	
    	// dd($ketqua);
    	return view('admin.ketqua.ketqua',['ketqua'=>$ketqua, 'xeploai'=>$xeploai]);
    }
    
     public function ketquathi_gv(){
        $kythi = KyThi::all();
        $monthi = MonThi::all();
        // dd($kythi);
       $ketqua = DB::table('ketqua')
    	->join('hocsinh','hocsinh.id_hs','ketqua.id_hs')
    	->join('dethi','dethi.id_de','ketqua.id_de')
    	->join('monthi','monthi.id_mh','dethi.id_mh')
    	->join('kythi','kythi.id_ky','dethi.id_ky')->get()->toArray();
        
    	// $diem = DB::table('ketqua')->pluck('diem');
    	// // dd($diem[0]);
    	// 	$xeploai='';
    	// if($diem[0] <5){
    	// 	$xeploai = 'Yếu';
    	// }
    	// elseif($diem[0] ==5){
    	// 	$xeploai = 'Trung bình';
    	// }
    	// elseif($diem[0] ==6 ){
    	// 	$xeploai = 'TB Khá';
    	// }
    	// elseif($diem[0] ==7 ){
    	// 	$xeploai = 'Khá';
    	// }
    	// elseif($diem[0] >=8 ){
    	// 	$xeploai = 'Giỏi';
    	// }
    	
    	// dd($ketqua);
    	return view('admin.ketqua.ketqua_gv',['ketqua'=>$ketqua,'kythi'=>$kythi,'monthi'=>$monthi]);
    }

    public function exportPDF(){
        
        $ketqua = DB::table('ketqua')
    	->join('hocsinh','hocsinh.id_hs','ketqua.id_hs')
    	->join('dethi','dethi.id_de','ketqua.id_de')
    	->join('monthi','monthi.id_mh','dethi.id_mh')
    	->join('kythi','kythi.id_ky','dethi.id_ky')->get()->toArray();
    	$diem = DB::table('ketqua')->pluck('diem');
    	// dd($diem[0]);
    	$xeploai='';
    	if($diem[0] <5){
    		$xeploai = 'Yếu';
    	}
    	elseif($diem[0] ==5){
    		$xeploai = 'Trung bình';
    	}
    	elseif($diem[0] ==6 ){
    		$xeploai = 'TB Khá';
    	}
    	elseif($diem[0] ==7 ){
    		$xeploai = 'Khá';
    	}
    	elseif($diem[0] >=8 ){
    		$xeploai = 'Giỏi';
    	}
    	
    	// dd($ketqua);
    	// return view('admin.ketqua.ketqua_gv',['ketqua'=>$ketqua, 'xeploai'=>$xeploai]);

      $pdf = PDF::loadView('admin.ketqua.ketquaExportPDF',compact('ketqua','xeploai'));
      $pdf->save(storage_path().'_filename.pdf');
      return $pdf->download('ketqua.pdf');
      }
}
