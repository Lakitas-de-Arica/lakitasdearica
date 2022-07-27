<?php

namespace App\Http\Livewire\Multimedia;

use App\Contracts\Multimedia\MultimediaInterface;
use Livewire\Component;

class Delete extends Component
{
    protected $multimediaService;
    public $multimedia;
    public $urlPrevious;
    public $title;

    public function boot(MultimediaInterface $multimediaService)
    {
        $this->multimediaService = $multimediaService;
    }

    public function mount($multimedia, $urlPrevious)
    {
        $this->multimedia = $multimedia;
        $this->title = $multimedia->title;
        $this->urlPrevious = $urlPrevious;
    }

    public function render()
    {
        return view('livewire.multimedia.delete');
    }

    public function submit()
    {
        $this->multimediaService->delete($this->multimedia->id);

        session()->flash('success', 'Archivo eliminado');

        return redirect($this->urlPrevious);
    }
}
