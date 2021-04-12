<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Excel;
use App\LoaiCauHoi;
use App\Imports\LoaiCauHoiImport;
use Auth;

class LoaiCauhoiController extends Controller
{
    public function getLoai(){
    	$loai = LoaiCauHoi::all(); //lấy ds loại
        return view('admin.loaicauhoi.dsloaicauhoi',['loai'=>$loai]);
    }

    public function themloai(){
    	return view('admin.loaicauhoi.themloaicauhoi');
    }
     public function dash(){
    return view('admin.dashbroad');
}
    public function postthemloai(Request $request){
    	//kiểm tra lỗi 
    	$this->validate($request,
    		[
    			'tenloai' => 'required|unique:loaicauhoi,tenloai|min:3|max:100'    //tenloai là name của input khi nhập thêm
    		],
    		[
    			'tenloai.required'=> 'Bạn chưa nhập tên loại',
    			'tenloai.unique' => 'Tên loại câu hỏi đã tồn tại',
    			'tenloai.min'=>'Tên loại phải có độ dài từ 3-100 ký tự',
    			'tenloai.max'=>'Tên loại phải có độ dài từ 3-100 ký tự',

    		]);
    	//sau khi bắt lỗi xong, lấy dlieu lưu vào trong model
    	$loai = new LoaiCauHoi;
    	$loai->tenloai = $request->tenloai;
    	//lưu
    	$loai->save();
    	//dẫn về trang 
    	return redirect('giaovien/loaicauhoi/themloai')->with('thongbao','Thêm thành công!');
    }


    public function sualoai($id){

    	$loai = LoaiCauHoi::find($id); //lấy id cần sửa
    	return view('admin.loaicauhoi.sualoaicauhoi',['loai'=>$loai]); //truyền thông tin ứng vs id cần sửa lên view để sửa
    }

    //hàm phải có 2 biến truyền vào là yêu cầu sửa, và sửa id nào
    public function postsualoai(Request $request,$id){
    	$loai = LoaiCauHoi::find($id);
    	$this->validate($request,
    	[
    						   //kiểm tra đã nhập chưa, bị trùng tên trong bảng, cột tenloai
    			'tenloai' => 'required|unique:loaicauhoi,tenloai|min:3|max:100'    //tenloai là name của input khi nhập thêm
    		],
    		[
    			'tenloai.required'=> 'Bạn chưa nhập tên loại',
    			'tenloai.unique' => 'Tên loại câu hỏi đã tồn tại',
    			'tenloai.min'=>'Tên loại phải có độ dài từ 3-100 ký tự',
    			'tenloai.max'=>'Tên loại phải có độ dài từ 3-100 ký tự',

    		]);
    	$loai->tenloai = $request->tenloai; //gán tên nhập bằng tên xử lý trong hàm
    	$loai->save(); //lưu lại trong csdl

    	return redirect('giaovien/loaicauhoi/dsloai/')->with('thongbao','Sửa thành công!');
    }

    public function getxoaloai($id){
    	LoaiCauHoi::destroy($id);
    	return redirect('giaovien/loaicauhoi/dsloai/')->with('thongbao','Bạn đã xóa thành công!');
    }


    // public function Export(){
    // 	$contact = Contact::select('tenloai')->get();
    // 	return Excel::create('data_contact', function($excel) use ($contact){
    // 		$sheet->fromArray($contact);
    // 	})->download('xls');
    // }
  

    public function getImport(){
        return view('admin.loaicauhoi.import');
    }

  
   

   public function importExcel(Request $request) 
    {
       
        Excel::import(new LoaiCauHoiImport,request()->file('file'));
           
        return redirect('giaovien/loaicauhoi/dsloai')->with('thongbao','Import file Excel thành công!');
    }
}
