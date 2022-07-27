<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\Multimedia;

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
        $multimedia = Multimedia::where('gallery',1)
                                    ->where('gallery_history_ch',1)
                                    ->where('publish',1)
                                    ->take(option('nGalleryHistoryCh',4))
                                    ->inRandomOrder()
                                    ->get();

        return view('frontend.sections.comparsas-historicas')
                ->with('multimedia',$multimedia)
                ->with('page',$page);
    }

    public function viejosSopladores()
    {
        $page = Page::where('title','Viejos Sopladores')->first();
        $multimedia = Multimedia::where('gallery',1)
                                    ->where('gallery_history_vs',1)
                                    ->where('publish',1)
                                    ->take(option('nGalleryHistoryVs',4))
                                    ->inRandomOrder()
                                    ->get();

        return view('frontend.sections.viejos-sopladores')
                ->with('multimedia',$multimedia)
                ->with('page',$page);
    }

    public function contact()
    {
        $page = Page::where('title','Contacto')->first();

        return view('frontend.sections.contact')
                ->with('page',$page);
    }
}
