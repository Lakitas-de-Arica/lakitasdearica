<?php

namespace App\Http\Livewire\News;

use Livewire\Component;
use App\Models\News;

class Related extends Component
{
    public $newId;

    public function mount($newId)
    {
        $this->newId = $newId;
    }

    public function render()
    {
        $news = News::where('publish',1)
                    ->where('id','<>',$this->newId)
                    ->orderBy('date','desc')
                    ->take(3)
                    ->get();

        return view('livewire.news.related')
                ->with('news',$news);
    }
}
