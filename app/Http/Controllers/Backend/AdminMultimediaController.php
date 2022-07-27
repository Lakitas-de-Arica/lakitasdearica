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

    public function create(Request $request)
    {
        $urlPrevious = $request->has('urlprevious')? $request->input('urlprevious') : url()->previous();
        $comparsa_id = $request->has('comparsa')? $request->input('comparsa') : null;

        return view('backend.multimedia.create')
                ->with('urlPrevious', $urlPrevious)
                ->with('comparsa_id', $comparsa_id);
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
