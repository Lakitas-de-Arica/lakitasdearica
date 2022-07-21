<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Multimedia;
use Illuminate\Support\Facades\Auth;

class MultimediaController extends Controller
{
    public function index()
    {
        return view('frontend.multimedia.index');
    }

    public function show($slug)
    {
        $multimedia = Multimedia::firstWhere('slug',$slug);

        if($multimedia->publish == 0 AND !Auth::check()) {
            abort(404);
        }

        return view('frontend.multimedia.show')
                ->with('multimedia',$multimedia);
    }

}
