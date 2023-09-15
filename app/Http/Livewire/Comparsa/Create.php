<?php

namespace App\Http\Livewire\Comparsa;

use Livewire\Component;
use App\Contracts\Comparsa\ComparsaInterface;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;
    protected $comparsaService;
    public $comparsa;
    public $urlPrevious;
    public $name;
    public $date;
    public $image;
    public $location;
    public $members;
    public $extract;
    public $text;
    public $text_1;
    public $text_2;
    public $text_3;
    public $text_4;
    public $text_5;
    public $text_6;
    public $link;
    public $contact_name;
    public $contact_email;
    public $contact_phone;
    public $web;
    public $facebook;
    public $instagram;
    public $source_form;
    public $publish;

    protected $rules = [
        'name' => 'required|min:3|max:255',
        'date' => 'required|date',
        'extract' => 'nullable|min:5|max:65000',
        'text' => 'required|min:20|max:65000',
        'image' => 'required|image|max:3072',
        'location' => 'nullable|min:5|max:65000',
        'members' => 'required|min:3|max:65000',
        'text_1' => 'nullable|min:20|max:65000',
        'text_2' => 'nullable|min:20|max:65000',
        'text_3' => 'nullable|min:20|max:65000',
        'text_4' => 'nullable|min:20|max:65000',
        'text_5' => 'nullable|min:20|max:65000',
        'text_6' => 'nullable|min:20|max:65000',
        'link' => 'nullable|url|min:3|max:255',
        'contact_name' => 'nullable|min:3|max:255',
        'contact_email' => 'nullable|email|max:255',
        'contact_phone' => 'nullable|min:3|max:13',
        'web' => 'nullable|url|min:3|max:255',
        'facebook' => 'nullable|url|min:3|max:255',
        'instagram' => 'nullable|url|min:3|max:255',
    ];

    protected $messages = [
        'date.date' => 'Formato de fecha no válido',
        'image.image' => 'Formato de archivo no válido (admitidos: jpg, png, gif)',
        'image.max' => 'El archivo es demasiado grande, tamaño máximo 3MB',
        '*.url' => 'Link no válido, incluir el prefijo https://',
        '*.min' => 'El campo debe tener al menos :min caracteres',
        '*.max' => 'El campo no debe exceder los :max caracteres',
        'contact_email.email' => 'Email no válido',
        '*.required' => 'El campo es requerido',
        '*.required_if' => 'El campo es requerido',
    ];

    public function boot(ComparsaInterface $comparsaService)
    {
        $this->comparsaService = $comparsaService;
    }

    public function mount($urlPrevious)
    {
        $this->urlPrevious   = $urlPrevious;
        $this->publish = 1;
        $this->source_form = 0;
    }

    public function render()
    {
        return view('livewire.comparsa.create');
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function submit()
    {
        $this->validate();

        $image = $this->image->store('comparsa', 'public') ;

        $this->comparsaService->store([
            'name'            => $this->name,
            'date'            => $this->date,
            'location'        => $this->location,
            'members'         => $this->members,
            'extract'         => $this->extract,
            'text'            => $this->text,
            'image'           => $image,
            'text_1'          => $this->text_1,
            'text_2'          => $this->text_2,
            'text_3'          => $this->text_3,
            'text_4'          => $this->text_4,
            'text_5'          => $this->text_5,
            'text_6'          => $this->text_6,
            'link'            => $this->link,
            'contact_name'    => $this->contact_name,
            'contact_email'   => $this->contact_email,
            'contact_phone'   => $this->contact_phone,
            'web'             => $this->web,
            'facebook'        => $this->facebook,
            'instagram'       => $this->instagram,
            'publish'         => $this->publish,
            'created_user_id' => auth()->user()->id,
            'source_form'     => $this->source_form
        ]);

        session()->flash('success', 'Comparsa creada');

        return redirect($this->urlPrevious);
    }
}
