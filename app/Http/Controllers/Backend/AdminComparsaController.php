<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Comparsa;

class AdminComparsaController extends Controller
{
    public function index()
    {
        return view('backend.comparsas.index');
    }

    public function create()
    {
        $urlPrevious = url()->previous();

        return view('backend.news.create')
                ->with('urlPrevious', $urlPrevious);
    }

    public function edit($id)
    {
        $comparsa = Comparsa::findOrFail($id);
        $urlPrevious = url()->previous();

        return view('backend.comparsas.edit')
                ->with('comparsa', $comparsa)
                ->with('urlPrevious', $urlPrevious);
    }

    public function delete($id)
    {
        $comparsa = Comparsa::findOrFail($id);
        $urlPrevious = url()->previous();

        return view('backend.comparsas.delete')
                ->with('comparsa', $comparsa)
                ->with('urlPrevious', $urlPrevious);
    }
}
