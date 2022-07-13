<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comparsa;

class ComparsaController extends Controller
{
    public function index()
    {
        return view('frontend.comparsas.index');
    }

    public function show($slug)
    {
        $comparsa = Comparsa::firstWhere('slug',$slug);

        if (!$comparsa) abort(404);

        return view('frontend.comparsas.show')
                ->with('comparsa',$comparsa);
    }

    public function publish()
    {
        return view('frontend.comparsas.publish');
    }
}
