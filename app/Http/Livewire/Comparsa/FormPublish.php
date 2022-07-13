<?php

namespace App\Http\Livewire\Comparsa;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Contracts\Comparsa\ComparsaInterface;
use Carbon\Carbon;

class FormPublish extends Component
{
    use WithFileUploads;

    protected $comparsaService;
    public $name;
    public $date;
    public $location;
    public $members;
    public $text_1;
    public $text_2;
    public $text_3;
    public $text_4;
    public $text_5;
    public $text_6;
    public $link;
    public $web;
    public $facebook;
    public $instagram;
    public $contact_name;
    public $contact_phone;
    public $contact_email;
    public $recaptcha;

    protected $rules = [
        'name' => 'required|min:3|max:255',
        'date' => 'required|date',
        'location' => 'required|min:3|max:255',
        'members' => 'required|min:3|max:255',
        'text_1' => 'nullable|min:3|max:65000',
        'text_2' => 'nullable|min:3|max:65000',
        'text_3' => 'nullable|min:3|max:65000',
        'text_4' => 'nullable|min:3|max:65000',
        'text_5' => 'nullable|min:3|max:65000',
        'text_6' => 'nullable|min:3|max:65000',
        'link' => 'nullable|active_url|min:3|max:255',
        'web' => 'nullable|active_url|min:3|max:255',
        'facebook' => 'nullable|min:3|max:255',
        'instagram' => 'nullable|min:3|max:255',
        'contact_name' => 'required|min:3|max:255',
        'contact_email' => 'required|email|min:3|max:255',
        'contact_phone' => 'required|min:3|max:13',
        'recaptcha' => 'required|captcha'
    ];

    protected $messages = [
        'date.date' => 'Formato de fecha no válido',
        'image.image' => 'Formato de archivo no válido (admitidos: jpg, png, gif)',
        'image.max' => 'El archivo es demasiado grande, tamaño máximo 3MB',
        '*.active_url' => 'Link no válido, incluir el prefijo https://',
        '*.min' => 'El campo debe tener al menos :min caracteres',
        '*.max' => 'El campo no debe exceder los :max caracteres',
        'contact_email.email' => 'Email no válido',
        'recaptcha.required' => 'Debes resolver el captcha',
        'recaptcha.captcha' => 'Error al validar el captcha',
        '*.required' => 'El campo es requerido',
    ];

    public function boot(ComparsaInterface $comparsaService)
    {
        $this->comparsaService = $comparsaService;
    }

    public function render()
    {
        return view('livewire.comparsa.form-publish');
    }

    public function updated($propertyName)
    {
        if ($propertyName !== 'recaptcha') {
            $this->validateOnly($propertyName);
        }
    }

    public function submit()
    {
        $this->emit('resetReCaptcha');

        $this->validate();

        $this->comparsaService->store([
            'name' => $this->name,
            'image' => null,
            'date' => Carbon::parse($this->date)->format('Y-m-d'),
            'location' => $this->location,
            'members' => $this->members,
            'extract' => null,
            'text' => null,
            'text_1' => $this->text_1,
            'text_2' => $this->text_2,
            'text_3' => $this->text_3,
            'text_4' => $this->text_4,
            'text_5' => $this->text_5,
            'text_6' => $this->text_6,
            'link' => $this->link,
            'web' => $this->web,
            'facebook' => $this->facebook,
            'instagram' => $this->instagram,
            'contact_name' => $this->contact_name,
            'contact_email' => $this->contact_email,
            'contact_phone' => $this->contact_phone,
            'publish' => 0,
            'user_id' => null,
            'contact_validation' => 0,
            'source_form' => 1
        ]);

        session()->flash('success', 'Información enviada, revisaremos el registro y te notificaremos.');

        return redirect()->route('comparsa.publish');
    }
}
