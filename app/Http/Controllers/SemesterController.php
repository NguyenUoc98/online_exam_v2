<?php

namespace App\Http\Controllers;

use App\Models\Semester;
use Illuminate\Http\Request;

class SemesterController extends Controller
{
    public function show($slug) {
        $semester = Semester::whereSlug($slug)->firstOrFail();
        return view('semester.show', compact('semester'));
    }
}
