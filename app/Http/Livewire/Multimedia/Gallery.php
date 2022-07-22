<?php

namespace App\Http\Livewire\Multimedia;

use Livewire\Component;
use App\Models\Multimedia;

class Gallery extends Component
{
    public function render()
    {
        $multimedia = Multimedia::where('gallery',1)->take(10)->get();

        return view('livewire.multimedia.gallery')
                ->with('multimedia',$multimedia);
    }
}
