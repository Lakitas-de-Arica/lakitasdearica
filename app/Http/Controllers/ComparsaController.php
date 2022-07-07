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

        return view('frontend.comparsas.show')
                ->with('new',$comparsa);
    }

    public function publish()
    {
        return view('frontend.comparsas.publish');
    }
}
