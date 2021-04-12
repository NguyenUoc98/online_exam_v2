<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use App\GiaoVien;
use App\MonThi;
use App\Khoi;
use App\KyThi;
use App\CtDeThi;
use App\DeThi;
use App\MucDo;
use App\DapAnDung;
use App\CauHoi;
use App\ThaoLuanDeThi;
use App\User;
use App\HocSinh;
use App\KetQua;
use App\LoaiCauHoi;
use DB;
class ThongKeController extends Controller
{
    public function thongke_ad(){

    	$giaovien = GiaoVien::all();
    	$hocsinh = HocSinh::all();
    	$monthi = MonThi::all();
    	$khoi = Khoi::all();
    	$user = User::all();
    	$ketqua = KetQua::all();
    	 $diemlietmh1 = DB::table('ketqua')
        ->where('diem','<=','1') ->where('id_mh','=','1')->get()->pluck('diem');
        $diemtbmh1 = DB::table('ketqua')
        ->where('diem','>','1')->where('diem','<=','5')->where('id_mh','=','1')->get()->pluck('diem');
        $diemkhamh1 = DB::table('ketqua')
        ->where('diem','>','5')->where('diem','<=','7')->where('id_mh','=','1')->get()->pluck('diem');
        $diemgioimh1 = DB::table('ketqua')
        ->where('diem','>','7')->where('diem','<=','10')->where('id_mh','=','1')->get()->pluck('diem');

         $diemlietmh2 = DB::table('ketqua')
        ->where('diem','<=','1') ->where('id_mh','=','2')->get()->pluck('diem');
        $diemtbmh2 = DB::table('ketqua')
        ->where('diem','>','1')->where('diem','<=','5')->where('id_mh','=','2')->get()->pluck('diem');
        $diemkhamh2 = DB::table('ketqua')
        ->where('diem','>','5')->where('diem','<=','7')->where('id_mh','=','2')->get()->pluck('diem');
        $diemgioimh2 = DB::table('ketqua')
        ->where('diem','>','7')->where('diem','<=','10')->where('id_mh','=','2')->get()->pluck('diem');

         $diemlietmh3 = DB::table('ketqua')
        ->where('diem','<=','1') ->where('id_mh','=','3')->get()->pluck('diem');
        $diemtbmh3 = DB::table('ketqua')
        ->where('diem','>','1')->where('diem','<=','5')->where('id_mh','=','3')->get()->pluck('diem');
        $diemkhamh3 = DB::table('ketqua')
        ->where('diem','>','5')->where('diem','<=','7')->where('id_mh','=','3')->get()->pluck('diem');
        $diemgioimh3 = DB::table('ketqua')
        ->where('diem','>','7')->where('diem','<=','10')->where('id_mh','=','3')->get()->pluck('diem');

         $diemlietmh4 = DB::table('ketqua')
        ->where('diem','<=','1') ->where('id_mh','=','4')->get()->pluck('diem');
        $diemtbmh4 = DB::table('ketqua')
        ->where('diem','>','1')->where('diem','<=','5')->where('id_mh','=','4')->get()->pluck('diem');
        $diemkhamh4 = DB::table('ketqua')
        ->where('diem','>','5')->where('diem','<=','7')->where('id_mh','=','4')->get()->pluck('diem');
        $diemgioimh4 = DB::table('ketqua')
        ->where('diem','>','7')->where('diem','<=','10')->where('id_mh','=','4')->get()->pluck('diem');

        $diemlietmh5 = DB::table('ketqua')
        ->where('diem','<=','1') ->where('id_mh','=','5')->get()->pluck('diem');
        $diemtbmh5 = DB::table('ketqua')
        ->where('diem','>','1')->where('diem','<=','5')->where('id_mh','=','5')->get()->pluck('diem');
        $diemkhamh5 = DB::table('ketqua')
        ->where('diem','>','5')->where('diem','<=','7')->where('id_mh','=','5')->get()->pluck('diem');
        $diemgioimh5 = DB::table('ketqua')
        ->where('diem','>','7')->where('diem','<=','10')->where('id_mh','=','5')->get()->pluck('diem');

        $diemlietmh6 = DB::table('ketqua')
        ->where('diem','<=','1') ->where('id_mh','=','6')->get()->pluck('diem');
        $diemtbmh6 = DB::table('ketqua')
        ->where('diem','>','1')->where('diem','<=','5')->where('id_mh','=','6')->get()->pluck('diem');
        $diemkhamh6 = DB::table('ketqua')
        ->where('diem','>','5')->where('diem','<=','7')->where('id_mh','=','6')->get()->pluck('diem');
        $diemgioimh6 = DB::table('ketqua')
        ->where('diem','>','7')->where('diem','<=','10')->where('id_mh','=','6')->get()->pluck('diem');

        $diemlietmh7 = DB::table('ketqua')
        ->where('diem','<=','1') ->where('id_mh','=','7')->get()->pluck('diem');
        $diemtbmh7 = DB::table('ketqua')
        ->where('diem','>','1')->where('diem','<=','5')->where('id_mh','=','7')->get()->pluck('diem');
        $diemkhamh7 = DB::table('ketqua')
        ->where('diem','>','5')->where('diem','<=','7')->where('id_mh','=','7')->get()->pluck('diem');
        $diemgioimh7 = DB::table('ketqua')
        ->where('diem','>','7')->where('diem','<=','10')->where('id_mh','=','7')->get()->pluck('diem');

        $diemlietmh8 = DB::table('ketqua')
        ->where('diem','<=','1') ->where('id_mh','=','8')->get()->pluck('diem');
        $diemtbmh8 = DB::table('ketqua')
        ->where('diem','>','1')->where('diem','<=','5')->where('id_mh','=','8')->get()->pluck('diem');
        $diemkhamh8 = DB::table('ketqua')
        ->where('diem','>','5')->where('diem','<=','7')->where('id_mh','=','8')->get()->pluck('diem');
        $diemgioimh8 = DB::table('ketqua')
        ->where('diem','>','7')->where('diem','<=','10')->where('id_mh','=','8')->get()->pluck('diem');

        $diemlietmh9 = DB::table('ketqua')
        ->where('diem','<=','1') ->where('id_mh','=','9')->get()->pluck('diem');
        $diemtbmh9 = DB::table('ketqua')
        ->where('diem','>','1')->where('diem','<=','5')->where('id_mh','=','9')->get()->pluck('diem');
        $diemkhamh9 = DB::table('ketqua')
        ->where('diem','>','5')->where('diem','<=','7')->where('id_mh','=','9')->get()->pluck('diem');
        $diemgioimh9 = DB::table('ketqua')
        ->where('diem','>','7')->where('diem','<=','10')->where('id_mh','=','9')->get()->pluck('diem');

        $diemlietmh10 = DB::table('ketqua')
        ->where('diem','<=','1') ->where('id_mh','=','10')->get()->pluck('diem');
        $diemtbmh10 = DB::table('ketqua')
        ->where('diem','>','1')->where('diem','<=','5')->where('id_mh','=','10')->get()->pluck('diem');
        $diemkhamh10 = DB::table('ketqua')
        ->where('diem','>','5')->where('diem','<=','7')->where('id_mh','=','10')->get()->pluck('diem');
        $diemgioimh10 = DB::table('ketqua')
        ->where('diem','>','7')->where('diem','<=','10')->where('id_mh','=','10')->get()->pluck('diem');

        $diemlietmh11 = DB::table('ketqua')
        ->where('diem','<=','1') ->where('id_mh','=','11')->get()->pluck('diem');
        $diemtbmh11 = DB::table('ketqua')
        ->where('diem','>','1')->where('diem','<=','5')->where('id_mh','=','11')->get()->pluck('diem');
        $diemkhamh11 = DB::table('ketqua')
        ->where('diem','>','5')->where('diem','<=','7')->where('id_mh','=','11')->get()->pluck('diem');
        $diemgioimh11 = DB::table('ketqua')
        ->where('diem','>','7')->where('diem','<=','10')->where('id_mh','=','11')->get()->pluck('diem');
    	
    	

    	 return view('admin.layout.dashbroad_ad',['giaovien'=>$giaovien, 'hocsinh'=>$hocsinh, 'monthi'=>$monthi,'khoi'=>$khoi, 'user'=>$user,'ketqua'=>$ketqua,'diemlietmh1'=>$diemlietmh1,'diemtbmh1'=>$diemtbmh1,'diemkhamh1'=>$diemkhamh1,'diemgioimh1'=>$diemgioimh1,'diemlietmh2'=>$diemlietmh2,'diemtbmh2'=>$diemtbmh2,'diemkhamh2'=>$diemkhamh2,'diemgioimh2'=>$diemgioimh2,'diemlietmh3'=>$diemlietmh3,'diemtbmh3'=>$diemtbmh3,'diemkhamh3'=>$diemkhamh3,'diemgioimh3'=>$diemgioimh3,'diemlietmh4'=>$diemlietmh4,'diemtbmh4'=>$diemtbmh4,'diemkhamh4'=>$diemkhamh4,'diemgioimh4'=>$diemgioimh4,'diemlietmh5'=>$diemlietmh5,'diemtbmh5'=>$diemtbmh5,'diemkhamh5'=>$diemkhamh5,'diemgioimh5'=>$diemgioimh5,'diemlietmh6'=>$diemlietmh6,'diemtbmh6'=>$diemtbmh6,'diemkhamh6'=>$diemkhamh6,'diemgioimh6'=>$diemgioimh6,'diemlietmh7'=>$diemlietmh7,'diemtbmh7'=>$diemtbmh7,'diemkhamh7'=>$diemkhamh7,'diemgioimh7'=>$diemgioimh7,'diemlietmh8'=>$diemlietmh8,'diemtbmh8'=>$diemtbmh8,'diemkhamh8'=>$diemkhamh8,'diemgioimh8'=>$diemgioimh8,'diemlietmh9'=>$diemlietmh9,'diemtbmh9'=>$diemtbmh9,'diemkhamh9'=>$diemkhamh9,'diemgioimh9'=>$diemgioimh9,'diemlietmh10'=>$diemlietmh10,'diemtbmh10'=>$diemtbmh10,'diemkhamh10'=>$diemkhamh10,'diemgioimh10'=>$diemgioimh10,'diemlietmh11'=>$diemlietmh11,'diemtbmh11'=>$diemtbmh11,'diemkhamh11'=>$diemkhamh11,'diemgioimh11'=>$diemgioimh11]);
    }
    

     
      public function thongke_gv(){

    	$loaich = LoaiCauHoi::all();
        $hocsinh = HocSinh::all();
    	$cauhoi = CauHoi::all();
    	$monthi = MonThi::all();
    	$khoi = Khoi::all();
        $dethi = DeThi::all();
    	$mucdo = MucDo::all();
    	// $ketqua = KetQua::all();
        $diemlietmh1 = DB::table('ketqua')
        ->where('diem','<=','1') ->where('id_mh','=','1')->get()->pluck('diem');
        $diemtbmh1 = DB::table('ketqua')
        ->where('diem','>','1')->where('diem','<=','5')->where('id_mh','=','1')->get()->pluck('diem');
        $diemkhamh1 = DB::table('ketqua')
        ->where('diem','>','5')->where('diem','<=','7')->where('id_mh','=','1')->get()->pluck('diem');
        $diemgioimh1 = DB::table('ketqua')
        ->where('diem','>','7')->where('diem','<=','10')->where('id_mh','=','1')->get()->pluck('diem');

         $diemlietmh2 = DB::table('ketqua')
        ->where('diem','<=','1') ->where('id_mh','=','2')->get()->pluck('diem');
        $diemtbmh2 = DB::table('ketqua')
        ->where('diem','>','1')->where('diem','<=','5')->where('id_mh','=','2')->get()->pluck('diem');
        $diemkhamh2 = DB::table('ketqua')
        ->where('diem','>','5')->where('diem','<=','7')->where('id_mh','=','2')->get()->pluck('diem');
        $diemgioimh2 = DB::table('ketqua')
        ->where('diem','>','7')->where('diem','<=','10')->where('id_mh','=','2')->get()->pluck('diem');

         $diemlietmh3 = DB::table('ketqua')
        ->where('diem','<=','1') ->where('id_mh','=','3')->get()->pluck('diem');
        $diemtbmh3 = DB::table('ketqua')
        ->where('diem','>','1')->where('diem','<=','5')->where('id_mh','=','3')->get()->pluck('diem');
        $diemkhamh3 = DB::table('ketqua')
        ->where('diem','>','5')->where('diem','<=','7')->where('id_mh','=','3')->get()->pluck('diem');
        $diemgioimh3 = DB::table('ketqua')
        ->where('diem','>','7')->where('diem','<=','10')->where('id_mh','=','3')->get()->pluck('diem');

         $diemlietmh4 = DB::table('ketqua')
        ->where('diem','<=','1') ->where('id_mh','=','4')->get()->pluck('diem');
        $diemtbmh4 = DB::table('ketqua')
        ->where('diem','>','1')->where('diem','<=','5')->where('id_mh','=','4')->get()->pluck('diem');
        $diemkhamh4 = DB::table('ketqua')
        ->where('diem','>','5')->where('diem','<=','7')->where('id_mh','=','4')->get()->pluck('diem');
        $diemgioimh4 = DB::table('ketqua')
        ->where('diem','>','7')->where('diem','<=','10')->where('id_mh','=','4')->get()->pluck('diem');

        $diemlietmh5 = DB::table('ketqua')
        ->where('diem','<=','1') ->where('id_mh','=','5')->get()->pluck('diem');
        $diemtbmh5 = DB::table('ketqua')
        ->where('diem','>','1')->where('diem','<=','5')->where('id_mh','=','5')->get()->pluck('diem');
        $diemkhamh5 = DB::table('ketqua')
        ->where('diem','>','5')->where('diem','<=','7')->where('id_mh','=','5')->get()->pluck('diem');
        $diemgioimh5 = DB::table('ketqua')
        ->where('diem','>','7')->where('diem','<=','10')->where('id_mh','=','5')->get()->pluck('diem');

        $diemlietmh6 = DB::table('ketqua')
        ->where('diem','<=','1') ->where('id_mh','=','6')->get()->pluck('diem');
        $diemtbmh6 = DB::table('ketqua')
        ->where('diem','>','1')->where('diem','<=','5')->where('id_mh','=','6')->get()->pluck('diem');
        $diemkhamh6 = DB::table('ketqua')
        ->where('diem','>','5')->where('diem','<=','7')->where('id_mh','=','6')->get()->pluck('diem');
        $diemgioimh6 = DB::table('ketqua')
        ->where('diem','>','7')->where('diem','<=','10')->where('id_mh','=','6')->get()->pluck('diem');

        $diemlietmh7 = DB::table('ketqua')
        ->where('diem','<=','1') ->where('id_mh','=','7')->get()->pluck('diem');
        $diemtbmh7 = DB::table('ketqua')
        ->where('diem','>','1')->where('diem','<=','5')->where('id_mh','=','7')->get()->pluck('diem');
        $diemkhamh7 = DB::table('ketqua')
        ->where('diem','>','5')->where('diem','<=','7')->where('id_mh','=','7')->get()->pluck('diem');
        $diemgioimh7 = DB::table('ketqua')
        ->where('diem','>','7')->where('diem','<=','10')->where('id_mh','=','7')->get()->pluck('diem');

        $diemlietmh8 = DB::table('ketqua')
        ->where('diem','<=','1') ->where('id_mh','=','8')->get()->pluck('diem');
        $diemtbmh8 = DB::table('ketqua')
        ->where('diem','>','1')->where('diem','<=','5')->where('id_mh','=','8')->get()->pluck('diem');
        $diemkhamh8 = DB::table('ketqua')
        ->where('diem','>','5')->where('diem','<=','7')->where('id_mh','=','8')->get()->pluck('diem');
        $diemgioimh8 = DB::table('ketqua')
        ->where('diem','>','7')->where('diem','<=','10')->where('id_mh','=','8')->get()->pluck('diem');

        $diemlietmh9 = DB::table('ketqua')
        ->where('diem','<=','1') ->where('id_mh','=','9')->get()->pluck('diem');
        $diemtbmh9 = DB::table('ketqua')
        ->where('diem','>','1')->where('diem','<=','5')->where('id_mh','=','9')->get()->pluck('diem');
        $diemkhamh9 = DB::table('ketqua')
        ->where('diem','>','5')->where('diem','<=','7')->where('id_mh','=','9')->get()->pluck('diem');
        $diemgioimh9 = DB::table('ketqua')
        ->where('diem','>','7')->where('diem','<=','10')->where('id_mh','=','9')->get()->pluck('diem');

        $diemlietmh10 = DB::table('ketqua')
        ->where('diem','<=','1') ->where('id_mh','=','10')->get()->pluck('diem');
        $diemtbmh10 = DB::table('ketqua')
        ->where('diem','>','1')->where('diem','<=','5')->where('id_mh','=','10')->get()->pluck('diem');
        $diemkhamh10 = DB::table('ketqua')
        ->where('diem','>','5')->where('diem','<=','7')->where('id_mh','=','10')->get()->pluck('diem');
        $diemgioimh10 = DB::table('ketqua')
        ->where('diem','>','7')->where('diem','<=','10')->where('id_mh','=','10')->get()->pluck('diem');

        $diemlietmh11 = DB::table('ketqua')
        ->where('diem','<=','1') ->where('id_mh','=','11')->get()->pluck('diem');
        $diemtbmh11 = DB::table('ketqua')
        ->where('diem','>','1')->where('diem','<=','5')->where('id_mh','=','11')->get()->pluck('diem');
        $diemkhamh11 = DB::table('ketqua')
        ->where('diem','>','5')->where('diem','<=','7')->where('id_mh','=','11')->get()->pluck('diem');
        $diemgioimh11 = DB::table('ketqua')
        ->where('diem','>','7')->where('diem','<=','10')->where('id_mh','=','11')->get()->pluck('diem');
        // dd($diemgioi);
    	return view('admin.layout.dashbroad_gv',['loaich'=>$loaich,'hocsinh'=>$hocsinh, 'cauhoi'=>$cauhoi, 'monthi'=>$monthi,'khoi'=>$khoi, 'mucdo'=>$mucdo,'dethi'=>$dethi,'diemlietmh1'=>$diemlietmh1,'diemtbmh1'=>$diemtbmh1,'diemkhamh1'=>$diemkhamh1,'diemgioimh1'=>$diemgioimh1,'diemlietmh2'=>$diemlietmh2,'diemtbmh2'=>$diemtbmh2,'diemkhamh2'=>$diemkhamh2,'diemgioimh2'=>$diemgioimh2,'diemlietmh3'=>$diemlietmh3,'diemtbmh3'=>$diemtbmh3,'diemkhamh3'=>$diemkhamh3,'diemgioimh3'=>$diemgioimh3,'diemlietmh4'=>$diemlietmh4,'diemtbmh4'=>$diemtbmh4,'diemkhamh4'=>$diemkhamh4,'diemgioimh4'=>$diemgioimh4,'diemlietmh5'=>$diemlietmh5,'diemtbmh5'=>$diemtbmh5,'diemkhamh5'=>$diemkhamh5,'diemgioimh5'=>$diemgioimh5,'diemlietmh6'=>$diemlietmh6,'diemtbmh6'=>$diemtbmh6,'diemkhamh6'=>$diemkhamh6,'diemgioimh6'=>$diemgioimh6,'diemlietmh7'=>$diemlietmh7,'diemtbmh7'=>$diemtbmh7,'diemkhamh7'=>$diemkhamh7,'diemgioimh7'=>$diemgioimh7,'diemlietmh8'=>$diemlietmh8,'diemtbmh8'=>$diemtbmh8,'diemkhamh8'=>$diemkhamh8,'diemgioimh8'=>$diemgioimh8,'diemlietmh9'=>$diemlietmh9,'diemtbmh9'=>$diemtbmh9,'diemkhamh9'=>$diemkhamh9,'diemgioimh9'=>$diemgioimh9,'diemlietmh10'=>$diemlietmh10,'diemtbmh10'=>$diemtbmh10,'diemkhamh10'=>$diemkhamh10,'diemgioimh10'=>$diemgioimh10,'diemlietmh11'=>$diemlietmh11,'diemtbmh11'=>$diemtbmh11,'diemkhamh11'=>$diemkhamh11,'diemgioimh11'=>$diemgioimh11]);
    }
}
