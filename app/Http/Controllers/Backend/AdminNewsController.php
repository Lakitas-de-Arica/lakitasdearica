<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\News;

class AdminNewsController extends Controller
{
    public function index()
    {
        return view('backend.news.index');
    }

    public function create()
    {
        $urlPrevious = url()->previous();

        return view('backend.news.create')
                ->with('urlPrevious', $urlPrevious);
    }

    public function edit($id)
    {
        $new = News::findOrFail($id);
        $urlPrevious = url()->previous();

        return view('backend.news.edit')
                ->with('new', $new)
                ->with('urlPrevious', $urlPrevious);
    }

    public function delete($id)
    {
        $new = News::findOrFail($id);
        $urlPrevious = url()->previous();

        return view('backend.news.delete')
                ->with('new', $new)
                ->with('urlPrevious', $urlPrevious);
    }
}
