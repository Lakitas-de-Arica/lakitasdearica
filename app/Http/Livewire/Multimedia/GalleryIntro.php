<?php

namespace App\Http\Livewire\Multimedia;

use Livewire\Component;

class GalleryIntro extends Component
{
    public function render()
    {
        $multimedia = [
            asset('images/introduccion/slide-intro-1.jpg'),
            asset('images/introduccion/slide-intro-2.jpg'),
            asset('images/introduccion/slide-intro-3.jpg'),
            asset('images/introduccion/slide-intro-4.jpg'),
            asset('images/introduccion/slide-intro-5.jpg'),
            asset('images/introduccion/slide-intro-6.jpg'),
            asset('images/introduccion/slide-intro-7.jpg'),
            asset('images/introduccion/slide-intro-8.jpg'),
        ];

        return view('livewire.multimedia.gallery-intro')
                ->with('multimedia',$multimedia);
    }
}
