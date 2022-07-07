<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        return view('frontend.sections.home');
    }

    public function introduction()
    {
        return view('frontend.sections.introduction');
    }

    public function history()
    {
        return view('frontend.sections.history');
    }

    public function contact()
    {
        return view('frontend.sections.contact');
    }
}
