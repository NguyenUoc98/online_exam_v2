<?php

namespace App\Http\Controllers;

use App\Models\Page;
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

    public function news() {
        return view('page.news');
    }

    public function page($slug) {
        $page = Page::whereSlug($slug)->firstOrFail();
        return view('page.show', compact('page'));
    }
}
