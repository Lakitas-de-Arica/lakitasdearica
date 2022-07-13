<?php

namespace App\Http\Livewire\Comparsa;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Comparsa;

class Show extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $paginate;
    public $numberOfItems;

    public function mount($paginate = true, $numberOfItems = 4)
    {
        $this->paginate = $paginate;
        $this->numberOfItems = $numberOfItems;
    }

    public function render()
    {
        $comparsas = Comparsa::where('publish',1)->orderBy('date','desc');

        if ($this->paginate) {
            $comparsas = $comparsas->paginate($this->numberOfItems);
        } else {
            $comparsas = $comparsas->take($this->numberOfItems)->get();
        }

        return view('livewire.comparsa.show')
                ->with('paginate',$this->paginate)
                ->with('comparsas',$comparsas);
    }
}
