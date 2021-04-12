<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Database\Eloquent\Model;
use Validator;
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
use DB;
use Excel;
use Auth;

use App\Imports\ImportRecipes;
use Illuminate\Support\Arr;

class DethiController extends Controller
{
   public function getDethi(){
        // $dethi = DeThi::all();
        // $kythi = KyThi::all();
    $id_user = Auth::id();
        $dethi = DB::table('dethi')->orderBy('id_de','DESC')
        ->join('kythi','kythi.id_ky','=','dethi.id_ky')
        ->join('khoi','khoi.id_khoi','=','dethi.id_khoi')
        ->join('monthi','monthi.id_mh','=','dethi.id_mh')
        ->join('giaovien','giaovien.id_gv','=','dethi.id_gv')
        ->where('giaovien.id','=',$id_user)
        ->get()->toArray();
        // dd($dethi);
    	return view('admin.dethi.dsdethi',['dethi'=>$dethi]);
    }


    public function hocsinhctdethi($id){
        $dethi = DB::table('dethi')
        ->join('monthi', 'monthi.id_mh', '=', 'dethi.id_mh')
        ->join('khoi', 'khoi.id_khoi', '=', 'dethi.id_khoi')
        ->join('kythi', 'kythi.id_ky', '=', 'dethi.id_ky')
       ->select('monthi.tenmh','monthi.hinhanh','kythi.tenky','socau', 'thoigianthi','id_de','khoi.tenkhoi')
       ->where('id_de','=', $id)
       ->get()->toArray();

       $delienquan = DB::table('dethi')
        ->join('monthi', 'monthi.id_mh', '=', 'dethi.id_mh')
        ->join('khoi', 'khoi.id_khoi', '=', 'dethi.id_khoi')
        ->join('kythi', 'kythi.id_ky', '=', 'dethi.id_ky')
       ->select('monthi.tenmh','monthi.hinhanh','kythi.tenky','socau', 'thoigianthi','id_de','khoi.tenkhoi')
       ->where('kythi.tenky','like', '%'.'THPT Quốc Gia'.'%')->paginate(4);

       $binhluan= DB::table('thaoluandethi')
       ->join('users','users.id', '=', 'thaoluandethi.id')
       ->join('dethi','dethi.id_de', '=', 'thaoluandethi.id_de')
       ->select('thaoluandethi.noidung','users.id','users.name','thaoluandethi.created_at')
       ->where('thaoluandethi.id_de','=',$id)->paginate(10);

       $id_de = $id;
        return view('admin.thitructuyen.chitiet',['dethi'=>$dethi, 'delienquan'=>$delienquan,'binhluan'=>$binhluan,'id_de'=>$id_de]);
    }


    public function getCtdethi($id){
        $mucdo = MucDo::all();
         $dethi = DeThi::find($id);

         $ctdethi = DB::table('ctdethi')
        ->join('cauhoi', 'cauhoi.id_cauhoi', '=', 'ctdethi.id_cauhoi')
        ->join('dethi', 'dethi.id_de', '=', 'ctdethi.id_de')
        ->where('ctdethi.id_de','=', $id)
        ->select('ctdethi.id_de','cauhoi.id_cauhoi','cauhoi.id_loaich','cauhoi.noidung', 'cauhoi.a', 'cauhoi.b', 'cauhoi.c', 'cauhoi.d')
        ->get()->toArray();

         $mdnhanbiet = DB::table('cauhoi')
         ->join('mucdo','mucdo.id_mucdo','=','cauhoi.id_mucdo')
         ->where('mucdo.tenmd','like','%'.'Nhận biết'.'%')
         ->where('cauhoi.id_mh','=',$dethi->id_mh)
         ->where('cauhoi.id_khoi','=',$dethi->id_khoi)
         ->get()->toArray();

         $mdthonghieu = DB::table('cauhoi')
         ->join('mucdo','mucdo.id_mucdo','=','cauhoi.id_mucdo')
         ->where('mucdo.tenmd','like','%'.'Thông hiểu'.'%')
         ->where('cauhoi.id_mh','=',$dethi->id_mh)
         ->where('cauhoi.id_khoi','=',$dethi->id_khoi)
         ->get()->toArray();

         $mdvandung = DB::table('cauhoi')
         ->join('mucdo','mucdo.id_mucdo','=','cauhoi.id_mucdo')
         ->where('mucdo.tenmd','like','%'.'Vận dụng'.'%')
         ->where('cauhoi.id_mh','=',$dethi->id_mh)
         ->where('cauhoi.id_khoi','=',$dethi->id_khoi)
         ->get()->toArray();


         //cái này là để lấy tấc cả các id_cauhoi trong ctdethi add vao 1 mang, để dùng lm điều kiện query dap an,
        $id_cauhoi = array();
        foreach ($ctdethi as $item) {

             array_push($id_cauhoi, (integer)$item->id_cauhoi);
             // dd($id_cauhoi);
        }
         $dapan = Db::table('dapandung')->whereIn('id_cauhoi', $id_cauhoi)->get();  // lấy những đáp án có id_cau hỏi  nằm trong cái mãng đó
           // dd($dapan);
    	return view('admin.dethi.ctdethi',['dethi'=>$dethi, 'ctdethi'=>$ctdethi, 'mucdo'=>$mucdo, 'dapan' =>$dapan, 'mdnhanbiet'=>$mdnhanbiet,'thonghieu'=>$mdthonghieu,'mdvandung'=>$mdvandung]);
    }

    public function themdethi(){
         $kythi = KyThi::all();
        $monthi = MonThi::all();
        $giaovien = GiaoVien::all();
        $khoi = Khoi::all();
        return view('admin.dethi.themdethi',['kythi'=>$kythi,'monthi'=>$monthi, 'giaovien'=>$giaovien, 'khoi'=>$khoi]);

    }

    public function thempostdethi(Request $request){
        $this->validate($request,
            [
                'tenkythi' =>'required',
                'namekhoi' =>'required',
                'namemonthi' =>'required',
                'trangthai' =>'required',
                'namegv' =>'required',
                'ngaythi' =>'required|date',
                'thoigianthi' => 'required|numeric|min:2',
                'socau' => 'required|numeric|min:2'
            ],
            [
                'tenkythi.required'=> 'Bạn chưa chọn tên kỳ thi',
                'namekhoi.required'=> 'Bạn chưa chọn tên khối',
                'namemonthi.required'=> 'Bạn chưa chọn tên môn thi',
                'namegv.required'=> 'Bạn chưa chọn tên giáo viên',
                'ngaythi.required'=> 'Bạn chưa nhập ngày thi',
                'ngaythi.date'=> 'Vui lòng nhập đúng định dạng ngày tháng năm',
                'trangthai.required'=> 'Bạn chưa nhập trạng thái đề thi',

                'thoigianthi.required'=> 'Bạn chưa nhập thời gian thi',
                'thoigianthi.numeric' => 'Thời gian thi phải là ký tự số',
                'thoigianthi.min'=>'Thời gian thi có độ dài ít nhất 2 ký tự số',
                // 'thoigianthi.max'=>'Thời gian thi có độ dài không quá 3 ký tự số',

                'socau.required'=> 'Bạn chưa nhập số câu',
                'socau.numeric' => 'Số câu phải là ký tự số',
                'socau.min'=>'Số câu có độ dài ít nhất 2 ký tự số',
                // 'socau.max'=>'Số câu có độ dài không quá 3 ký tự số',

            ]);
        //sau khi bắt lỗi xong, lấy dlieu lưu vào trong model
            $de = new DeThi;
            $de->id_ky = $request->tenkythi;
            $de->id_khoi = $request->namekhoi;
            $de->id_mh = $request->namemonthi;
            $de->id_gv = $request->namegv;
            $de->ngaythi = $request->ngaythi;       // date('d/m/Y', strtotime($request->ngaythi))
            $de->thoigianthi = $request->thoigianthi;
            $de->socau = $request->socau;
            $de->trangthai = $request->trangthai;
            //lưu
            $de->save();
            //dẫn về trang
            return redirect('giaovien/dethi/dsdethi')->with('thongbao','Thêm thành công!');
    }

    public function getsuade($id){
         $dethi = DeThi::find($id);
    	 $kythi = KyThi::all();
        $monthi = MonThi::all();
        $giaovien = GiaoVien::all();
        $khoi = Khoi::all();
        return view('admin.dethi.suadethi',['kythi'=>$kythi,'monthi'=>$monthi, 'giaovien'=>$giaovien, 'khoi'=>$khoi,'dethi'=>$dethi]);
    }

    public function postsuade($id, Request $request){
        $de = DeThi::find($id);
        $this->validate($request,
            [
                'tenkythi' =>'required',
                'namekhoi' =>'required',
                'namemonthi' =>'required',
                'trangthai' =>'required',
                'namegv' =>'required',
                'ngaythi' =>'required|date',
                'thoigianthi' => 'required|numeric|min:2',
                'socau' => 'required|numeric|min:2'
            ],
            [
                'tenkythi.required'=> 'Bạn chưa chọn tên kỳ thi',
                'namekhoi.required'=> 'Bạn chưa chọn tên khối',
                'namemonthi.required'=> 'Bạn chưa chọn tên môn thi',
                'namegv.required'=> 'Bạn chưa chọn tên giáo viên',
                'ngaythi.required'=> 'Bạn chưa nhập ngày thi',
                'ngaythi.date'=> 'Vui lòng nhập đúng định dạng ngày tháng năm',
                'trangthai.required'=> 'Bạn chưa nhập trạng thái đề thi',

                'thoigianthi.required'=> 'Bạn chưa nhập thời gian thi',
                'thoigianthi.numeric' => 'Thời gian thi phải là ký tự số',
                'thoigianthi.min'=>'Thời gian thi có độ dài ít nhất 2 ký tự số',
                // 'thoigianthi.max'=>'Thời gian thi có độ dài không quá 3 ký tự số',

                'socau.required'=> 'Bạn chưa nhập số câu',
                'socau.numeric' => 'Số câu phải là ký tự số',
                'socau.min'=>'Số câu có độ dài ít nhất 2 ký tự số',
                // 'socau.max'=>'Số câu có độ dài không quá 3 ký tự số',

            ]);
        //sau khi bắt lỗi xong, lấy dlieu lưu vào trong model
            $de->id_ky = $request->tenkythi;
            $de->id_khoi = $request->namekhoi;
            $de->id_mh = $request->namemonthi;
            $de->id_gv = $request->namegv;
            $de->ngaythi = date('d/m/Y', strtotime($request->ngaythi));
            $de->thoigianthi = $request->thoigianthi;
            $de->socau = $request->socau;
            $de->trangthai = $request->trangthai;
            //lưu
            $de->save();
            //dẫn về trang
            return redirect('giaovien/dethi/dsdethi')->with('thongbao','Sửa thành công!');
    }

    public function xoade($id){
        DeThi::destroy($id);
        return redirect('giaovien/dethi/dsdethi')->with('thongbao','Bạn đã xóa thành công!');

    }

      public function importmd(){
        return view('admin.mucdo.import');
    }

      public function importExcel(Request $request){

         Excel::import(new ImportRecipes, $request->file);

        return view('admin.dethi.dsdethi');
    }



    public function randomcauhoi(Request $request){
         $this->validate($request,
            [
                'socau_md1' =>'required|numeric',
                'socau_md2' =>'required|numeric',
                'socau_md3' =>'required|numeric'
            ],
            [
                'socau_md1.required' =>'Vui lòng nhập số câu',
                'socau_md1.numeric' =>'Vui lòng nhập đúng ký tự số',
                'socau_md2.required' =>'Vui lòng nhập số câu',
                'socau_md2.numeric' =>'Vui lòng nhập đúng ký tự số',
                'socau_md3.required' =>'Vui lòng nhập số câu',
                'socau_md3.numeric' =>'Vui lòng nhập đúng ký tự số'
            ]);

         $mdnhanbiet = DB::table('cauhoi')
         ->join('mucdo','mucdo.id_mucdo','=','cauhoi.id_mucdo')
         ->where('mucdo.tenmd','like','%'.'Nhận biết'.'%')
         ->where('cauhoi.id_mh','=',$request->idmonhoc)
         ->where('cauhoi.id_khoi','=',$request->idkhoi)->inRandomOrder()->take($request->socau_md1)
         ->get()->pluck('id_cauhoi');


           //$mdnhanbiet[0]->id_cauhoi
         $mdthonghieu = DB::table('cauhoi')
         ->join('mucdo','mucdo.id_mucdo','=','cauhoi.id_mucdo')
         ->where('mucdo.tenmd','like','%'.'Thông hiểu'.'%')
         ->where('cauhoi.id_mh','=',$request->idmonhoc)
         ->where('cauhoi.id_khoi','=',$request->idkhoi)->inRandomOrder()->take($request->socau_md2)
        ->get()->pluck('id_cauhoi');

         $mdvandung = DB::table('cauhoi')
         ->join('mucdo','mucdo.id_mucdo','=','cauhoi.id_mucdo')
         ->where('mucdo.tenmd','like','%'.'Vận dụng'.'%')
         ->where('cauhoi.id_mh','=',$request->idmonhoc)
         ->where('cauhoi.id_khoi','=',$request->idkhoi)->inRandomOrder()->take($request->socau_md3)
         ->get()->pluck('id_cauhoi');

         if($request->socau_md1 + $request->socau_md2 +$request->socau_md3 != $request->socauhoi){
            return redirect()->back()->with('thongbao',"Số câu hỏi không hợp lệ");
         }
         else{
             $all = array_merge($mdnhanbiet->toArray(), $mdthonghieu->toArray(), $mdvandung->toArray());

            $data = [];

            foreach ($all as $item) {
                $data[] = [
                    'id_de' => $request->idExam,
                    'id_cauhoi' => $item,
                    'created_at' => new \DateTime(),
                    'updated_at' => new \DateTime(),
                ];
            }
             CtDeThi::insert($data);
         }


          return redirect('giaovien/dethi/dsdethi')->with('thongbao',' Thành công!');


        // dd($data);
}


}
