<?php

namespace App\Http\Livewire\Multimedia;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Multimedia;
use App\Models\Comparsa;
use Carbon\Carbon;

class Show extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $paginate;
    public $numberOfItems;
    public $filtrocomparsa = "0";
    public $filtroformat = "0";
    public $filtrodate = "0";

    public function mount($paginate = true, $numberOfItems = 9)
    {
        $this->paginate = $paginate;
        $this->numberOfItems = $numberOfItems;
    }

    public function render()
    {
        $comparsas = Comparsa::where('publish',1)->orderBy('name','asc')->get();
        $formatos = config('multimedia.formats');

        if ($this->filtrocomparsa !== "0") {
            $multimedias = Comparsa::find($this->filtrocomparsa)->multimedia()
                                    ->where('publish',1)->orderBy('created_at','desc');
        } else {
            $multimedias = Multimedia::where('publish',1)->orderBy('created_at','desc');
        }

        if ($this->filtroformat !== "0") {
            $multimedias = $multimedias->where('format',$this->filtroformat);
        }

        $fechas = $this->getFiltroDate($multimedias);

        if ($this->filtrodate !== "0") {
            $multimedias = $multimedias->where('date','like',$this->filtrodate.'%');
        }

        if ($this->paginate) {
            $multimedias = $multimedias->paginate($this->numberOfItems);
        } else {
            $multimedias = $multimedias->take($this->numberOfItems)->get();
        }

        return view('livewire.multimedia.show')
                    ->with('paginate',$this->paginate)
                    ->with('multimedias',$multimedias)
                    ->with('formatos',$formatos)
                    ->with('fechas',$fechas)
                    ->with('comparsas',$comparsas);
    }

    public function getFiltroDate($multimedia)
    {
        $mul = $multimedia->get();
        $dateArray = Array();

        foreach ($mul as $m) {
            if(is_null($m->date)) { continue; }
            $dateArray[$m->date->format('Y-m')] = ucfirst(Carbon::parse($m->date)->translatedFormat('F Y'));
        }

        asort($dateArray);
        return $dateArray;
    }

    public function updated($propertyName)
    {
        if ($propertyName == 'filtrocomparsa' OR $propertyName == 'filtroformat' ) {
            $this->filtrodate = "0";
        }

        $this->resetPage();
    }
}
