<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use Illuminate\Support\Facades\Auth;

class NewsController extends Controller
{
    public function index()
    {
        return view('frontend.news.index');
    }

    public function show($slug)
    {
        $new = News::firstWhere('slug',$slug);

        if($new->publish == 0 AND !Auth::check()) {
            abort(404);
        }

        return view('frontend.news.show')
                ->with('new',$new);
    }

    public function publish()
    {
        return view('frontend.news.publish');
    }
}
