<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comparsa;
use App\Models\Multimedia;
use App\Models\News;

class AdminController extends Controller
{
    public function index()
    {
        $comparsas = Comparsa::count();
        $multimedia = Multimedia::count();
        $news = News::count();

        return view('backend.home')
                ->with('comparsas', $comparsas)
                ->with('multimedia', $multimedia)
                ->with('news', $news);
    }
}
