<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MucDo;
use Excel;
use App\Imports\MucdoImport;

class MucdoController extends Controller
{
    public function getMucdo(){
    	$mucdo = MucDo::all();
    	return view('admin.mucdo.dsmucdo',['mucdo'=>$mucdo]);
    }

    public function themmucdo(Request $request){
         $this->validate($request,
            [
                'tenmucdo'=>'required|min:2'
            ],
            [
                'tenmucdo.required' => 'Vui lòng nhập tên mức độ.',
                // 'tenmucdo.numeric' => 'Vui lòng nhập đúng ký tự.',
                'tenmucdo.min' => 'Tên loại ít nhất 2 ký tự.'
            ]);
         $mucdo = new MucDo();
         $mucdo->tenmd = $request->tenmucdo;
         $mucdo->save();
    	 return redirect('giaovien/mucdo/dsmucdo');
    }

    public function postsuamd(Request $request, $id){
       $mucdo = MucDo::find($id);
        $this->validate($request,
            [
                'tenmd'=>'required|min:2'
            ],
            [
                'tenmd.required' => 'Vui lòng nhập tên mức độ.',
                // 'tenmucdo.numeric' => 'Vui lòng nhập đúng ký tự.',
                'tenmd.min' => 'Tên loại ít nhất 2 ký tự.'
            ]);
         $mucdo->tenmd = $request->tenmd;
         $mucdo->save();
         return redirect('giaovien/mucdo/dsmucdo')->with('thongbao','Sửa thành công!');
    	
    }

    public function importmd(){
        return view('admin.mucdo.import');
    }

    
    public function xoamd($id){
        MucDo::destroy($id);
         return redirect('giaovien/mucdo/dsmucdo');
        
    }

    public function export(){
        $mucdo = MucDo::select('id_mucdo','tenmd')->get();
        return Excel::create('dsmucdo', function($excel) use ($mucdo){
            $excel->sheet('mysheet', function($sheet) use ($mucdo){
                $sheet->fromArray($contact);
            });
        })->download('xlsx');
    }


     public function import() 
    {
        Excel::import(new MucdoImport,request()->file('file'));
           
        return redirect('giaovien/mucdo/dsmucdo');
    }

    
}
