<?php

namespace App\Http\Controllers;

use App\Models\Semester;
use App\Models\Slide;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        $semesters = Semester::all();
        $slides = Slide::all();
        return view('page.home',compact('semesters', 'slides'));
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
