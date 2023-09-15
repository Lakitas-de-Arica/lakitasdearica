<?php

namespace App\Http\Livewire\Comparsa;

use Livewire\Component;
use App\Contracts\Comparsa\ComparsaInterface;
use Livewire\WithFileUploads;

class Edit extends Component
{
    use WithFileUploads;
    protected $comparsaService;
    public $comparsa;
    public $urlPrevious;
    public $name;
    public $date;
    public $image;
    public $current_image;
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
        'image' => 'nullable|image|max:3072',
        'location' => 'nullable|min:5|max:65000',
        'members' => 'nullable|min:3|max:65000',
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

    public function mount($comparsa, $urlPrevious)
    {
        $this->comparsa      = $comparsa;
        $this->urlPrevious   = $urlPrevious;

        $this->name          = $comparsa->name;
        $this->current_image = $comparsa->image;
        $this->date          = $comparsa->date->format('Y-m-d');
        $this->location      = $comparsa->location;
        $this->members       = $comparsa->members;
        $this->extract       = $comparsa->extract;
        $this->text          = $comparsa->text;
        $this->text_1        = $comparsa->text_1;
        $this->text_2        = $comparsa->text_2;
        $this->text_3        = $comparsa->text_3;
        $this->text_4        = $comparsa->text_4;
        $this->text_5        = $comparsa->text_5;
        $this->text_6        = $comparsa->text_6;
        $this->link          = $comparsa->link;
        $this->contact_name  = $comparsa->contact_name;
        $this->contact_email = $comparsa->contact_email;
        $this->contact_phone = $comparsa->contact_phone;
        $this->web           = $comparsa->web;
        $this->facebook      = $comparsa->facebook;
        $this->instagram     = $comparsa->instagram;
        $this->source_form   = $comparsa->source_form;
        $this->publish       = $comparsa->publish;
    }

    public function render()
    {
        return view('livewire.comparsa.edit');
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function submit()
    {
        $this->validate();

        $image = (is_null($this->image))? $this->comparsa->image : $this->image->store('comparsa', 'public') ;

        $this->comparsaService->update([
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
            'updated_user_id' => auth()->user()->id,
            'source_form'     => $this->source_form
        ], $this->comparsa->id);

        session()->flash('success', 'Comparsa actualizada');

        return redirect($this->urlPrevious);
    }
}
