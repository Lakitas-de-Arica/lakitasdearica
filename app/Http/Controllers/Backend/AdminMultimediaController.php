<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Multimedia;

class AdminMultimediaController extends Controller
{
    public function index()
    {
        return view('backend.multimedia.index');
    }

    public function create()
    {
        $urlPrevious = url()->previous();

        return view('backend.multimedia.create')
                ->with('urlPrevious', $urlPrevious);
    }

    public function edit($id)
    {
        $multimedia = Multimedia::findOrFail($id);
        $urlPrevious = url()->previous();

        return view('backend.multimedia.edit')
                ->with('multimedia', $multimedia)
                ->with('urlPrevious', $urlPrevious);
    }

    public function delete($id)
    {
        $multimedia = Multimedia::findOrFail($id);
        $urlPrevious = url()->previous();

        return view('backend.multimedia.delete')
                ->with('multimedia', $multimedia)
                ->with('urlPrevious', $urlPrevious);
    }
}
