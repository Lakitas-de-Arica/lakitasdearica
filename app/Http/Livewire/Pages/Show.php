<?php

namespace App\Http\Livewire\Pages;

use Livewire\Component;
use App\Models\Page;

class Show extends Component
{
    public function render()
    {
        $pages = Page::all();

        return view('livewire.pages.show')
                ->with('pages',$pages);
    }
}
