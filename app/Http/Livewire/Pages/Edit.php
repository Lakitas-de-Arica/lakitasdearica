<?php

namespace App\Http\Livewire\Pages;

use Livewire\Component;
use App\Models\Page;

class Edit extends Component
{
    public $page;
    public $title;
    public $text;
    public $gallery;
    public $nGalleryHistoryCh;
    public $nGalleryHistoryVs;

    public function render()
    {
        return view('livewire.pages.edit');
    }

    protected $rules = [
        'text' => 'required|min:20|max:65000',
    ];

    protected $messages = [
        '*.min' => 'El campo debe tener al menos :min caracteres',
        '*.max' => 'El campo no debe exceder los :max caracteres',
    ];

    public function mount(Page $page)
    {
        $this->page              = $page;
        $this->title             = $page->title;
        $this->text              = $page->text;
        $this->gallery           = $page->gallery;
        $this->nGalleryHistoryCh = option('nGalleryHistoryCh',4);
        $this->nGalleryHistoryVs = option('nGalleryHistoryVs',4);

    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function submit()
    {
        $this->validate();

        $this->page->text = $this->text;
        $this->page->gallery = $this->gallery;
        $this->page->save();

        option(['nGalleryHistoryCh' => $this->nGalleryHistoryCh]);
        option(['nGalleryHistoryVs' => $this->nGalleryHistoryVs]);

        session()->flash('success', 'Página actualizada');

        return redirect()->route('admin.pages');
    }
}
