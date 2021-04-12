<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use PdfMerger;
use App\MonThi;
use App\Khoi;
use App\KyThi;
use App\DeThi;
use App\Menu;
use App\CtBaiLam;
use App\DapAnDung;
use App\CtDeThi;
use App\MucDo;
use App\KetQua;
use DB;
use Auth;
use Hash;

class TrangchuController extends Controller
{
     public function getDeThi(){
        $dethi = DB::table('dethi')
        ->join('monthi', 'monthi.id_mh', '=', 'dethi.id_mh')
        ->join('kythi', 'kythi.id_ky', '=', 'dethi.id_ky')
       ->select('monthi.tenmh','monthi.hinhanh','kythi.tenky','socau', 'thoigianthi','id_de')
       ->where('kythi.id_ky','=', '4')
       ->where('trangthai','like', '%'.'Thi thử'.'%')->paginate(8);

        $dethi2 = DB::table('dethi')
        ->join('monthi', 'monthi.id_mh', '=', 'dethi.id_mh')
        ->join('kythi', 'kythi.id_ky', '=', 'dethi.id_ky')
       ->select('monthi.tenmh','monthi.hinhanh','kythi.tenky','socau', 'thoigianthi','id_de')
       ->where('kythi.id_ky','=', '5')
       ->where('trangthai','like', '%'.'Thi thử'.'%')->paginate(8);

        $dethi3 = DB::table('dethi')
        ->join('monthi', 'monthi.id_mh', '=', 'dethi.id_mh')
        ->join('kythi', 'kythi.id_ky', '=', 'dethi.id_ky')
       ->select('monthi.tenmh','monthi.hinhanh','kythi.tenky','socau', 'thoigianthi','id_de')
       ->where('kythi.id_ky','=', '2')
       ->where('trangthai','like', '%'.'Thi thử'.'%')->paginate(8);

       // $menu = DB::table('menu')
       // ->select('tenmenu','menu.id_menu')
       // ->get()->toArray();

       //  $menucon = DB::table('menu')
       // ->join('menucon', 'menucon.id_menu', '=', 'menu.id_menu')
       // ->select('tenmenu','menucon.noidung')
       // ->where('menucon.id_menu','=', '5')
       //  ->get()->toArray();
       return view('admin.layout.trangchu',['dethi'=>$dethi, 'dethi2'=>$dethi2, 'dethi3'=>$dethi3]);
    }


    public function getSearch(Request $req){
    	$dethi = DB::table('dethi')
        ->join('monthi', 'monthi.id_mh', '=', 'dethi.id_mh')
        ->join('kythi', 'kythi.id_ky', '=', 'dethi.id_ky')
       ->select('monthi.tenmh','monthi.hinhanh','kythi.tenky','socau', 'thoigianthi','id_de')
       ->where('kythi.tenky','like','%'.$req->key.'%')
       ->orWhere('monthi.tenmh','like','%'.$req->key.'%')
        ->get()->toArray();
    	
    	return view('admin.layout.search',compact('dethi'));
    }


    public function getdangnhap(Request $req){
    	return view('admin.layout.dangnhap');
    }

    public function postdangnhap(Request $req){
    	$this->validate($req,
    		[
    			'email'=>'required|email', //require: k đc rỗng, email: định dạng email
    			'password'=>'required|min:6|max:20'
    		],
    		[
    			'email.required'=>'Vui lòng nhập email',
    			'email.email'=>'Email không đúng định dạng',
    			'password.required'=>'Vui lòng nhập mật khẩu',
    			'password.min'=>'Mật khẩu ít nhất 6 ký tự',
    			'password.max'=>'Mật khẩu không quá 20 ký tự'
    		]
    	);
        //email và pass do ng dùng nhập lấy theo name input
    	$chungthuc =  array('email' => $req->email , 'password'=> $req->password );  
    	if(Auth::attempt($chungthuc)){
            if(Auth::user()->quyen == '0')
                return redirect('trangchu');
    		 if (Auth::user()->quyen == '1')
             return redirect('giaovien/dash/dashbroad_gv');
            if (Auth::user()->quyen == '2')
                 return redirect('dashbroad_ad');
            
    	}
    	else{
    		return redirect()->back()->with(['flag'=>'danger','message','Đăng nhập không thành công']);
    	}
    }


    public function postdangxuat(){
        Auth::logout();
        return redirect('trangchu');
    }

      public function gvdangxuat(){
        Auth::logout();
        return view('admin.layout.dangnhap');
    }

     
     public function getthithptquocgia(){

        $dethi = DB::table('dethi')
        ->join('monthi', 'monthi.id_mh', '=', 'dethi.id_mh')
        ->join('kythi', 'kythi.id_ky', '=', 'dethi.id_ky')
       ->select('monthi.tenmh','monthi.hinhanh','kythi.tenky','socau', 'thoigianthi','id_de')
       ->where('kythi.id_ky','=', '4')
       ->where('trangthai','like', '%'.'Thi thử'.'%')
        
        ->get()->toArray();

      return view('admin.tonghopdethi.thithptquocgia',['dethi'=>$dethi]);
     }

     
      public function getthihocky(){

        $dethi = DB::table('dethi')
        ->join('monthi', 'monthi.id_mh', '=', 'dethi.id_mh')
        ->join('kythi', 'kythi.id_ky', '=', 'dethi.id_ky')
       ->select('monthi.tenmh','monthi.hinhanh','kythi.tenky','socau', 'thoigianthi','id_de')
       ->where('kythi.id_ky','=', '5')
       ->where('trangthai','like', '%'.'Thi thử'.'%')
        
        ->get()->toArray();

      return view('admin.tonghopdethi.thihocky',['dethi'=>$dethi]);
     }

     public function thamgiathi($id){
         $dethi = DeThi::find($id);
         $user= Auth::id();
          $soluongcau = DB::table('ctdethi')
        ->join('cauhoi', 'cauhoi.id_cauhoi', '=', 'ctdethi.id_cauhoi')
        ->join('dethi', 'dethi.id_de', '=', 'ctdethi.id_de')
        ->where('ctdethi.id_de','=', $id)->get()->pluck('id_cauhoi');
// dd($soluongcau);
         $ctdethi = DB::table('ctdethi')
        ->join('cauhoi', 'cauhoi.id_cauhoi', '=', 'ctdethi.id_cauhoi')
        ->join('dethi', 'dethi.id_de', '=', 'ctdethi.id_de')
        ->where('ctdethi.id_de','=', $id)
        ->select('ctdethi.id_de','cauhoi.id_cauhoi','cauhoi.noidung','cauhoi.hinhanh','cauhoi.id_loaich', 'cauhoi.a', 'cauhoi.b', 'cauhoi.c', 'cauhoi.d')
        ->paginate(1);

        $ctbailam= DB::table('ctbailam')
      ->where('ctbailam.id_de','=',$id)->get()->pluck('id_cauhoi');
        // dd($ctbailam);
      return view('admin.thitructuyen.thitructuyen',['dethi'=>$dethi, 'ctdethi'=>$ctdethi,'soluongcau'=>$soluongcau,'user'=>$user,'ctbailam'=>$ctbailam]);

     }

     public function thamgiathi1($id){
         $dethi = DeThi::find($id);
         $user= Auth::id();
         $ctdethi = DB::table('ctdethi')
        ->join('cauhoi', 'cauhoi.id_cauhoi', '=', 'ctdethi.id_cauhoi')
        ->join('dethi', 'dethi.id_de', '=', 'ctdethi.id_de')
        ->where('ctdethi.id_de','=', $id)
        ->select('ctdethi.id_de','cauhoi.id_cauhoi','cauhoi.noidung','cauhoi.hinhanh','cauhoi.id_loaich', 'cauhoi.a', 'cauhoi.b', 'cauhoi.c', 'cauhoi.d')
        ->paginate(1);

         $ctbailam= DB::table('ctbailam')
        ->where('ctbailam.id_de','=',$id)->get()->pluck('da_chon','id_cauhoi');
         
      return view('admin.thitructuyen.loadcauhoithi',['dethi'=>$dethi, 'ctdethi'=>$ctdethi,'user'=>$user,'ctbailam'=>$ctbailam]);

     }


 public function bailamhocsinh(Request $request) {
       $ctde = DB::table('dethi')
        ->join('monthi', 'monthi.id_mh', '=', 'dethi.id_mh')
        ->join('khoi', 'khoi.id_khoi', '=', 'dethi.id_khoi')
        ->join('kythi', 'kythi.id_ky', '=', 'dethi.id_ky')
       ->select('monthi.tenmh','monthi.hinhanh','kythi.tenky','socau','dethi.id_de', 'thoigianthi','id_de','khoi.tenkhoi')
       ->where('id_de','=', $request->id_dethi)
       ->get()->toArray();
      $id = Auth::id();

      $id_loai = $request->id_loai;

       $dapanchon= DB::table('ctbailam')
        ->where('id_de','=',$request->id_dethi)
        ->where('id_user','=',$id)
        ->select('ctbailam.id_cauhoi','ctbailam.da_chon')->get()->pluck('da_chon','id_cauhoi');

        
      if (!$request->id_cauhoi || !ctype_digit($request->id_cauhoi)) {
        //place a code here to inform the user about it
      }

      
               $ctbailam = new CtBaiLam();
              $ctbailam->id_cauhoi = $request->id_cauhoi;
              $ctbailam->da_chon = $request->da_chon;
              $ctbailam->id_de = $request->id_de;
              $ctbailam->id_user = $id;
              $ctbailam->save();
     
      
 
      return view('admin.thitructuyen.ketquathi',['ctde'=>$ctde]);

  }

      public function getdiemthi($id){

        $ctde = DB::table('dethi')
        ->join('monthi', 'monthi.id_mh', '=', 'dethi.id_mh')
        ->join('khoi', 'khoi.id_khoi', '=', 'dethi.id_khoi')
        ->join('kythi', 'kythi.id_ky', '=', 'dethi.id_ky')
       ->select('monthi.tenmh','monthi.hinhanh','kythi.tenky','socau','dethi.id_de', 'thoigianthi','id_de','khoi.tenkhoi')
       ->where('id_de','=', $id)
       ->get()->toArray();

        $socau = DB::table('dethi')->where('id_de','=',$id)->get()->pluck('socau');
       
        $id_user = Auth::id();
        $idmh = DB::table('dethi')
        ->where('id_de','=', $id)->get()->pluck('id_mh');
        $dapanchon= DB::table('ctbailam')
        ->where('id_de','=',$id)
        ->where('id_user','=',$id_user)
        ->select('ctbailam.id_cauhoi','ctbailam.da_chon')->get()->pluck('da_chon','id_cauhoi');
          // dd($dapanchon);
        
     
        // $dapandung = DB::table('dethi')
        // ->join('ctdethi','ctdethi.id_de','=','dethi.id_de')
        // ->join('cauhoi','ctdethi.id_cauhoi','=','cauhoi.id_cauhoi')
        // ->join('dapandung','cauhoi.id_cauhoi','=','dapandung.id_cauhoi')->where('dethi.id_de','=',$id)
        // ->select('dapandung.id_cauhoi','dapandung.noidung')
        // ->pluck('noidung','id_cauhoi');

        $dapandung = DB::table('dapandung')
        ->join('cauhoi','cauhoi.id_cauhoi','=','dapandung.id_cauhoi')
        ->join('ctdethi','ctdethi.id_cauhoi','=','cauhoi.id_cauhoi')
        ->where('ctdethi.id_de','=',$id)->pluck('dapandung.noidung','dapandung.id_cauhoi');
        // dd($dapandung);

        $count = 0;
        foreach ($dapandung as $question => $answer) {
            if (!isset($dapanchon[$question]) || $dapanchon[$question] != $answer) {
                // echo sprintf("Sai ở câu: %s. Đáp án  là: %s\n", $question, $answer);

              $count++;
            }
        }


        $dung = $socau[0] - $count;
        $tinhdiem= (10/$socau[0])*$dung;
        $lamtrondiem = round($tinhdiem,2);
        // round($diem,2);
        $tyle= ($lamtrondiem *100)/10;
        $lamtrontyle = round($tyle,2);
        // dd($lamtrontyle);
        $ketqua = new KetQua();
        $ketqua->id_de = $id;
        $ketqua->id_hs = $id_user;
        $ketqua->socaudung = $dung;
        $ketqua->diem= $lamtrondiem;
         $ketqua->id_mh= $idmh[0];

         if($lamtrondiem<5)
           $ketqua->xeploai = 'Yếu';
         if($lamtrondiem>=5 && $lamtrondiem <=6)
           $ketqua->xeploai = 'Trung Bình';
         if($lamtrondiem==7)
           $ketqua->xeploai = 'Khá';
         if($lamtrondiem>=8)
           $ketqua->xeploai = 'Giỏi';
        $ketqua->save();

        $email="ngocthaohehe@gmail.com";
        // dd($diem);
   
    return view('admin.thitructuyen.ketquathi',['lamtrondiem'=>$lamtrondiem, 'count'=>$count,'lamtrontyle'=>$lamtrontyle,'ctde'=>$ctde, 'dung'=>$dung, 'email'=>$email]);
  }

      public function getlichsuthi($id){
          $ctdethi = DB::table('dethi')
        ->join('monthi', 'monthi.id_mh', '=', 'dethi.id_mh')
        ->join('khoi', 'khoi.id_khoi', '=', 'dethi.id_khoi')
        ->join('kythi', 'kythi.id_ky', '=', 'dethi.id_ky')
       ->select('monthi.tenmh','monthi.hinhanh','kythi.tenky','socau','dethi.id_de', 'thoigianthi','id_de','khoi.tenkhoi','dethi.trangthai')
       ->where('id_de','=', $id)
       ->get()->toArray();



         $ctdethi2 = DB::table('ctdethi')
        ->join('cauhoi', 'cauhoi.id_cauhoi', '=', 'ctdethi.id_cauhoi')
        ->join('dethi', 'dethi.id_de', '=', 'ctdethi.id_de')
        ->where('ctdethi.id_de','=', $id)
        ->select('ctdethi.id_de','cauhoi.id_cauhoi','cauhoi.noidung','cauhoi.id_loaich', 'cauhoi.a', 'cauhoi.b', 'cauhoi.c', 'cauhoi.d')
        // ->paginate(1);
        ->get()->toArray();

        $id_user = Auth::id();
        $dapanchon= DB::table('ctbailam')
        ->where('id_de','=',$id)
        ->where('id_user','=',$id_user)
        ->select('ctbailam.id_cauhoi','ctbailam.da_chon')->get()->pluck('da_chon','id_cauhoi');
          // dd($dapanchon);
   
     
        $dapandung = DB::table('dethi')
        ->join('ctdethi','ctdethi.id_de','=','dethi.id_de')
        ->join('cauhoi','ctdethi.id_cauhoi','=','cauhoi.id_cauhoi')
        ->join('dapandung','cauhoi.id_cauhoi','=','dapandung.id_cauhoi')->where('dethi.id_de','=',$id)
        ->select('dapandung.id_cauhoi','dapandung.noidung')
        ->get()->pluck('noidung','id_cauhoi');
        // dd($dapandung);

        
        // foreach ($dapandung as $question => $answer) {
        //     if (!isset($dapanchon[$question]) || $dapanchon[$question] != $answer) {
        //         echo sprintf("Sai ở câu: %s. Đáp án  là: %s\n", $question, $answer);
             
        //     }
        // }

        return view('admin.lichsubailam.lichsubaithi',['ctdethi'=>$ctdethi, 'ctdethi2'=>$ctdethi2, 'dapanchon'=>$dapanchon,'dapandung'=>$dapandung ]);
      }
     // public function thamgiathisp(){
     //  $khoi = DB::table('khoi')->paginate(1);
     //  return view('admin.layout.sp',['khoi'=>$khoi]);
     // }

     // public function thamgiathisp1(){

     //  $khoi = DB::table('khoi')->paginate(1);
     //  return view('admin.layout.sp1',['khoi'=>$khoi]);

      public function generatePDF($id){
        
        $mucdo = MucDo::all();
         $dethi = DeThi::find($id);

         $ctdethi = DB::table('ctdethi')
        ->join('cauhoi', 'cauhoi.id_cauhoi', '=', 'ctdethi.id_cauhoi')
        ->join('dethi', 'dethi.id_de', '=', 'ctdethi.id_de')
        ->where('ctdethi.id_de','=', $id)
        ->select('ctdethi.id_de','cauhoi.id_cauhoi','cauhoi.id_loaich','cauhoi.noidung', 'cauhoi.a', 'cauhoi.b', 'cauhoi.c', 'cauhoi.d')
        ->get()->toArray();
        $id_cauhoi = array();
        foreach ($ctdethi as $item) {

             array_push($id_cauhoi, (integer)$item->id_cauhoi);
             // dd($id_cauhoi);
        }
         $dapan = Db::table('dapandung')->whereIn('id_cauhoi', $id_cauhoi)->get(); 

      $pdf = PDF::loadView('admin.dethi.exportPDFctdethi',compact('dethi','ctdethi','dapan'));
      $pdf->save(storage_path().'_filename.pdf');
      return $pdf->download('dethi.pdf');
      }
    
}
