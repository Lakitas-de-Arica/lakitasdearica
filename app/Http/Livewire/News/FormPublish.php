<?php

namespace App\Http\Livewire\News;

use Livewire\Component;
use App\Contracts\New\NewInterface;
use Livewire\WithFileUploads;

class FormPublish extends Component
{
    use WithFileUploads;

    protected $newService;
    public $title;
    public $date;
    public $text;
    public $image;
    public $link;
    public $contact_name;
    public $contact_email;
    public $contact_phone;

    public function boot(NewInterface $newService)
    {
        $this->newService = $newService;
    }

    protected $rules = [
        'title' => 'required|min:3|max:255',
        'date' => 'required|date',
        'text' => 'required|min:6|max:65000',
        'image' => 'required|image|max:3072',
        'link' => 'nullable|active_url|min:3|max:255',
        'contact_name' => 'required|min:3|max:255',
        'contact_email' => 'required|email|min:3|max:255',
        'contact_phone' => 'required|min:3|max:13',
    ];

    protected $messages = [
        '*.required' => 'El campo es requerido',
        'date.date' => 'Formato de fecha no válido',
        'image.image' => 'Formato de archivo no válido (admitidos: jpg, png, gif)',
        'image.max' => 'El archivo es demasiado grande, tamaño máximo 3MB',
        'link.active_url' => 'Link no válido, incluir el prefijo https://',
        '*.min' => 'El campo debe tener al menos :min caracteres',
        '*.max' => 'El campo no debe exceder los :max caracteres',
        'contact_email.email' => 'Email no válido'
    ];

    public function render()
    {
        return view('livewire.news.form-publish');
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function submit()
    {
        $this->validate();

        $image = $this->image->store('news', 'public');

        $this->newService->store([
            'title' => $this->title,
            'date' => $this->date,
            'introduction' => null,
            'text' => $this->text,
            'image' => $image,
            'link' => $this->link,
            'contact_name' => $this->contact_name,
            'contact_email' => $this->contact_email,
            'contact_phone' => $this->contact_phone,
            'publish' => 0,
            'user_id' => null,
            'contact_validation' => 0,
        ]);

        $this->title = '';

        return true;
    }
}
