<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
class NewsController extends Controller
{
    public function index()
    {
        return view('frontend.news.index');
    }

    public function show($slug)
    {
        $new = News::firstWhere('slug',$slug);

        return view('frontend.news.show')
                ->with('new',$new);
    }
}
