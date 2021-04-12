<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CauHoi;
use App\LoaiCauHoi;
use App\MonThi;
use App\MucDo;
use App\Khoi;
use App\DapAnDung;
use App\Imports\CauhoiImport;
use Barryvdh\DomPDF\Facade as PDF;
use DB;
use Excel;

class CauhoiController extends Controller
{
     public function getCauhoi(){
     	// $cauhoi = CauHoi::orderBy('id_cauhoi','DESC')->get(); //lấy ra giảm dần theo id
        $cauhoi = DB::table('cauhoi')->orderBy('id_cauhoi','DESC')
        ->join('loaicauhoi','loaicauhoi.id_loaich','=','cauhoi.id_loaich')
        ->get()->toArray();
       //return view('admin.cauhoi.dscauhoi',['cauhoi'=>$cauhoi]);
    	//truyền biến cách khác
    	return view('admin.cauhoi.dscauhoi',['cauhoi'=>$cauhoi]);
    }

    public function getchitiet($id){     
        $cauhoi = CauHoi::find($id);
         $dapan = CauHoi::leftJoin('dapandung', 'cauhoi.id_cauhoi', '=', 'dapandung.id_cauhoi')->where('cauhoi.id_cauhoi',$id)->get()->toArray();
        $dapan_tontai = DB:: table('dapandung')
        ->where('id_cauhoi','=',$id)->get()->pluck('noidung');
        // dd($dapan);
      return view('admin.cauhoi.ctcauhoi',['dapan'=>$dapan,  'cauhoi'=>$cauhoi,'dapan_tontai'=>$dapan_tontai]);
    }

    public function themcauhoi(){
        $loai = LoaiCauHoi::all();
        $monthi = MonThi::all();
        $mucdo = MucDo::all();
        $khoi = Khoi::all();
        return view('admin.cauhoi.themcauhoi',['loaich'=>$loai,'mon'=>$monthi, 'mucdo'=>$mucdo, 'khoi'=>$khoi]); 
        //gọi đến giao diện và truyền dữ liệu sang gdien
    }

    public function themcauhoipost(Request $request){

        $this->validate($request, [
            'tenloai'=>'required',
            'tenmon'=>'required',
            'namekhoi'=>'required',
            'namemd'=>'required',
            'noidung'=>'required|unique:cauhoi,noidung',
            'a'=>'required',
            'b'=>'required',
          
        ],
        [
            'tenloai.required'=> 'Bạn chưa chọn tên loại',
            'tenmon.required'=> 'Bạn chưa chọn tên môn thi',
            'namekhoi.required'=> 'Bạn chưa chọn tên khối',
            'namemd.required'=> 'Bạn chưa chọn tên mức độ',
            'noidung.required'=> 'Bạn chưa nhập nội dung',
            'noidung.unique'=> 'Câu hỏi đã tồn tại!',
            'a.required'=> 'Bạn chưa nhập đáp án A',
            'b.required'=> 'Bạn chưa nhập đáp án B',
            
        ]);

        $cauhoi = new CauHoi;
        $cauhoi->id_loaich = $request->tenloai;
        $cauhoi->id_mh = $request->tenmon;
        $cauhoi->id_khoi = $request->namekhoi;
        $cauhoi->id_mucdo = $request->namemd;
        $cauhoi->noidung = $request->noidung;
         $cauhoi->a = $request->a;
        $cauhoi->b = $request->b;
        $cauhoi->c = $request->c;
        $cauhoi->d = $request->d;

        $nd = DB::table('cauhoi')->pluck('noidung')->toArray();
        //dd($nd);
        // @foreach($nd as $n){
        //      return redirect("giaovien/cauhoi/themcauhoi")->with('thongbao',"Câu hỏi đã tồn tại, vui lòng nhập câu hỏi khác!");
        // }
        //  @endforeach
        
        if($request->hasFile('txtfile'))
        {
            $file= $request->file('txtfile');
            $duoifile = $file->getClientOriginalExtension(); //lấy tên hình ra
            if($duoifile != 'jpg' && $duoifile != 'png' && $duoifile != 'jpeg'){
                return redirect("giaovien/cauhoi/themcauhoi")->with('thongbao',"Bạn chỉ được chọn file có đuôi jpg, png, jpeg");
            }
            $name = $file->getClientOriginalName(); //lấy tên gốc hình ra
            //đặt tên không trùng
            $hinh = str_random(4)."_".$name; 
            while(file_exists("upload/cauhoi".$hinh)){
                $hinh = str_random(4)."_".$name;
            }
            $file->move("upload/cauhoi",$hinh); //lưu
            $cauhoi->hinhanh = $hinh;
           
        }
        else
        {
            $cauhoi->hinhanh= "";
        }
       $cauhoi->save();

       
        return redirect("giaovien/cauhoi/dscauhoi")->with('thongbao',"Thêm câu hỏi thành công!");
    }

    public function getsuach($id){
         $cauhoi = CauHoi::find($id);
         $loai = LoaiCauHoi::all();
        $monthi = MonThi::all();
        $mucdo = MucDo::all();
        $khoi = Khoi::all();
         $dapan = CauHoi::leftJoin('dapandung', 'cauhoi.id_cauhoi', '=', 'dapandung.id_cauhoi')->where('cauhoi.id_cauhoi',$id)->get()->toArray();
        return view('admin.cauhoi.suacauhoi',['dapan'=>$dapan,  'cauhoi'=>$cauhoi, 'loaich'=>$loai,'mon'=>$monthi, 'mucdo'=>$mucdo, 'khoi'=>$khoi]);
    }

    public function postsuach($id, Request $request){

        $cauhoi =  CauHoi::find($id);
        $this->validate($request, [
            'tenloai'=>'required',
            'tenmon'=>'required',
            'namekhoi'=>'required',
            'namemd'=>'required',
            // 'noidung'=>'required|unique:cauhoi,noidung',
            'a'=>'required',
            'b'=>'required',
          
        ],
        [
            'tenloai.required'=> 'Bạn chưa chọn tên loại',
            'tenmon.required'=> 'Bạn chưa chọn tên môn thi',
            'namekhoi.required'=> 'Bạn chưa chọn tên khối',
            'namemd.required'=> 'Bạn chưa chọn tên mức độ',
            'noidung.required'=> 'Bạn chưa nhập nội dung',
            // 'noidung.unique'=> 'Câu hỏi đã tồn tại!',
            'a.required'=> 'Bạn chưa nhập đáp án A',
            'b.required'=> 'Bạn chưa nhập đáp án B',
            
        ]);

        
        $cauhoi->id_loaich = $request->tenloai;
        $cauhoi->id_mh = $request->tenmon;
        $cauhoi->id_khoi = $request->namekhoi;
        $cauhoi->id_mucdo = $request->namemd;
        $cauhoi->noidung = $request->noidung;
         $cauhoi->a = $request->a;
        $cauhoi->b = $request->b;
        $cauhoi->c = $request->c;
        $cauhoi->d = $request->d;

        $nd = DB::table('cauhoi')->pluck('noidung')->toArray();
        //dd($nd);
        // @foreach($nd as $n){
        //      return redirect("giaovien/cauhoi/themcauhoi")->with('thongbao',"Câu hỏi đã tồn tại, vui lòng nhập câu hỏi khác!");
        // }
        //  @endforeach
        
        if($request->hasFile('txtfile'))
        {
            $file= $request->file('txtfile');
            $duoifile = $file->getClientOriginalExtension();
            if($duoifile != 'jpg' && $duoifile != 'png' && $duoifile != 'jpeg'){
                return redirect("giaovien/cauhoi/themcauhoi")->with('thongbao',"Bạn chỉ được chọn file có đuôi jpg, png, jpeg");
            }
            $name = $file->getClientOriginalName(); //lấy tên gốc hình ra
            //đặt tên không trùng
            $hinh = str_random(4)."_".$name; 
            while(file_exists("upload/cauhoi".$hinh)){
                $hinh = str_random(4)."_".$name;
            }
            $file->move("upload/cauhoi",$hinh); //lưu
            $cauhoi->hinhanh = $hinh;
           
        }
        
       $cauhoi->save();

       
        return redirect("giaovien/cauhoi/dscauhoi")->with('thongbao',"Sửa câu hỏi thành công!");
    }

    public function xoach($id){
       CauHoi::destroy($id);
        return redirect('giaovien/cauhoi/dscauhoi/')->with('thongbao','Bạn đã xóa thành công!');
    }


    public function themdapan( Request $request){

        for($i =0;$i<count($request->chon);$i++){
            $dapandung = new DapAnDung;
            $dapandung->id_cauhoi = $request->id_cauhoi;
            $dapandung->noidung = $request->chon[$i];
       
             $dapandung->save();
         }
         return redirect('giaovien/cauhoi/dscauhoi');
    }

    public function ImportCauHoi(){
        return view('admin.cauhoi.import');
    } 

    
     public function import() 
    
    {

        Excel::import(new CauhoiImport,request()->file('file'));
           
        return redirect('giaovien/cauhoi/dscauhoi');
    }
    public function exportPDF(){
       $cauhoi = DB::table('cauhoi')->orderBy('id_cauhoi')
        ->join('loaicauhoi','loaicauhoi.id_loaich','=','cauhoi.id_loaich')
         ->join('mucdo','mucdo.id_mucdo','=','cauhoi.id_mucdo')
          ->join('khoi','khoi.id_khoi','=','cauhoi.id_khoi')
           ->join('monthi','monthi.id_mh','=','cauhoi.id_mh')
        ->get()->toArray();
         $pdf = PDF::loadView('admin.cauhoi.dscauhoipdf',compact('cauhoi'));
      $pdf->save(storage_path().'_filename.pdf');
      return $pdf->download('nganhangcauhoi.pdf');
    }
}
