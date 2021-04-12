<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use App\Models\Semester;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index() {
        $semesters = Semester::with('exams')->get();
        return view('page.home',compact('semesters'));
    }

    public function introduce() {
        return view('page.introduce');
    }

    public function news() {
        return view('page.news');
    }

    public function contact() {
        return view('page.contact');
    }
}
