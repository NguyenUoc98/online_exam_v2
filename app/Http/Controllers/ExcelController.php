<?php

namespace App\Http\Controllers;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use App\Exports\DethiExport;
use App\Exports\CauhoiExport;
use App\Imports\CauHoiImport;
use App\Exports\MucDoExport;
use App\Exports\KetQuaExport;
// use Excel;

class ExcelController extends Controller
{
    public function ExportDeThi(){  
    	 return Excel::download(new DethiExport, 'dethi.xlsx');
    }

    public function ExportCauHoi(){
    	 return Excel::download(new CauhoiExport, 'cauhoi.xlsx');
    }

     public function ImportCauHoi() 
    {
        Excel::import(new CauHoiImport, 'cauhoi.xlsx');
        
        return redirect('/')->with('success', 'All good!');
    }

    public function ExportMucDo(){
        return Excel::download(new MucDoExport, 'mucdo.xlsx');
    }


    public function exportKetQua(){
        return Excel::download(new KetQuaExport, 'ketqua.xlsx');
    }
 }