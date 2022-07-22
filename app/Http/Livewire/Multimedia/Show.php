<?php

namespace App\Http\Livewire\Multimedia;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Multimedia;

class Show extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $paginate;
    public $numberOfItems;

    public function mount($paginate = true, $numberOfItems = 9)
    {
        $this->paginate = $paginate;
        $this->numberOfItems = $numberOfItems;
    }

    public function render()
    {
        $multimedias = Multimedia::where('publish',1)->orderBy('created_at','desc');

        if ($this->paginate) {
            $multimedias = $multimedias->paginate($this->numberOfItems);
        } else {
            $multimedias = $multimedias->take($this->numberOfItems)->get();
        }

        return view('livewire.multimedia.show')
                    ->with('paginate',$this->paginate)
                    ->with('multimedias',$multimedias);
    }
}
