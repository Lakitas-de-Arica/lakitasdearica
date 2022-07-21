<?php

namespace App\Http\Livewire\Comparsa;

use Livewire\Component;
use App\Contracts\Comparsa\ComparsaInterface;

class Delete extends Component
{
    protected $comparsaService;
    public $comparsa;
    public $urlPrevious;
    public $name;

    public function boot(ComparsaInterface $comparsaService)
    {
        $this->comparsaService = $comparsaService;
    }

    public function mount($comparsa, $urlPrevious)
    {
        $this->comparsa = $comparsa;
        $this->name = $comparsa->name;
        $this->urlPrevious = $urlPrevious;
    }

    public function render()
    {
        return view('livewire.comparsa.delete');
    }

    public function submit()
    {
        $this->comparsaService->delete($this->comparsa->id);

        session()->flash('success', 'Comparsa eliminada');

        return redirect($this->urlPrevious);
    }
}
