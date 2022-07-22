<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Multimedia;
use Illuminate\Support\Facades\Auth;
use App\Contracts\Multimedia\MultimediaInterface;

class MultimediaController extends Controller
{
    protected $multimediaService;

    public function __construct(MultimediaInterface $multimediaService)
    {
        $this->multimediaService = $multimediaService;
    }

    public function index()
    {
        return view('frontend.multimedia.index');
    }

    public function show($slug)
    {
        $multimedia = Multimedia::firstWhere('slug',$slug);

        if($multimedia->publish == 0 AND !Auth::check()) {
            abort(404);
        }

        $previous = $this->multimediaService->getPrevious($multimedia);
        $next = $this->multimediaService->getNext($multimedia);

        return view('frontend.multimedia.show')
                ->with('multimedia',$multimedia)
                ->with('previous',$previous)
                ->with('next',$next)
                ->with('urlPrevious', route('multimedia'));
    }

}
