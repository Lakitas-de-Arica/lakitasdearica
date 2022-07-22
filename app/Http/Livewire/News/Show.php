<?php

namespace App\Http\Livewire\News;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\News;

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
        $news = News::where('publish',1)->orderBy('created_at','desc');

        if ($this->paginate) {
            $news = $news->paginate($this->numberOfItems);
        } else {
            $news = $news->take($this->numberOfItems)->get();
        }

        return view('livewire.news.show')
                ->with('paginate',$this->paginate)
                ->with('news',$news);
    }
}
