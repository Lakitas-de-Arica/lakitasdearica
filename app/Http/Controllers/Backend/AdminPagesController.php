<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Page;

class AdminPagesController extends Controller
{
    public function index()
    {
        return view('backend.pages.index');
    }

    public function edit($page)
    {
        $page = Page::findOrFail($page);

        return view('backend.pages.edit')
                    ->with('page',$page);
    }
}
