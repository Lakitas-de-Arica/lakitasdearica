<?php

namespace App\Http\Livewire\Comparsa;

use Livewire\Component;
use App\Models\Comparsa;

class Show extends Component
{
    public function render()
    {
        $comparsas = Comparsa::where('publish',1)->orderBy('created_at','desc')->get();

        return view('livewire.comparsa.show')
                ->with('comparsas',$comparsas);
    }
}
