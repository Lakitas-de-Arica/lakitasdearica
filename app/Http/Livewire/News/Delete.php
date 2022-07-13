<?php

namespace App\Http\Livewire\News;

use App\Contracts\New\NewInterface;
use Livewire\Component;

class Delete extends Component
{
    protected $newService;
    public $new;
    public $urlPrevious;
    public $title;

    public function boot(NewInterface $newService)
    {
        $this->newService = $newService;
    }

    public function mount($new, $urlPrevious)
    {
        $this->new = $new;
        $this->title = $new->title;
        $this->urlPrevious = $urlPrevious;
    }

    public function render()
    {
        return view('livewire.news.delete');
    }

    public function submit()
    {
        $this->newService->delete($this->new->id);

        session()->flash('success', 'Noticia eliminada');

        return redirect($this->urlPrevious);
    }
}
