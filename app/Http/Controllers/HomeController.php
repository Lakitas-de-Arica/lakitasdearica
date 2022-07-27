<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;

class HomeController extends Controller
{
    public function home()
    {
        $page = Page::where('title','Portada')->first();

        return view('frontend.sections.home')
                ->with('page',$page);
    }

    public function introduction()
    {
        $page = Page::where('title','Introducción')->first();

        return view('frontend.sections.introduction')
                ->with('page',$page);
    }

    public function history()
    {
        $page = Page::where('title','Historia')->first();

        return view('frontend.sections.history')
                ->with('page',$page);
    }

    public function comparsasHistoricas()
    {
        $page = Page::where('title','Comparsas históricas')->first();

        return view('frontend.sections.comparsas-historicas')
                ->with('page',$page);
    }

    public function viejosSopladores()
    {
        $page = Page::where('title','Viejos Sopladores')->first();

        return view('frontend.sections.viejos-sopladores')
                ->with('page',$page);
    }

    public function contact()
    {
        $page = Page::where('title','Contacto')->first();

        return view('frontend.sections.contact')
                ->with('page',$page);
    }
}
