<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Khoi;
use Excel;
use App\Imports\KhoiImport;

class KhoiController extends Controller
{

	public function getKhoi(){
    	$khoi = Khoi::all();
    	return view('admin.khoi.dskhoi',['khoi'=>$khoi]);
    }

    public function themkhoi(){
    	return view('admin.khoi.themkhoi');
    }

    public function suakhoi($id){
    	$khoi= Khoi::find($id);
    	return view('admin.khoi.suakhoi',['khoi'=>$khoi]);
    }

    public function importkhoi(){
        return view('admin.khoi.import');
    }

    
    public function xoakhoi($id){
        Khoi::destroy($id);
         return redirect('admin/khoi/dskhoi');
        
    }

    public function export(){
        $mucdo = Khoi::select('id_khoi','tenkhoi')->get();
        return Excel::create('dskhoi', function($excel) use ($khoi){
            $excel->sheet('mysheet', function($sheet) use ($khoi){
                $sheet->fromArray($contact);
            });
        })->download('xlsx');
    }

  public function import() 
    {
        Excel::import(new KhoiImport,request()->file('file'));
           
        return redirect('admin/khoi/dskhoi');
    }

    
}