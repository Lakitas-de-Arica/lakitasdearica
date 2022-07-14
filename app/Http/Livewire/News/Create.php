<?php

namespace App\Http\Livewire\News;

use Livewire\Component;
use App\Contracts\New\NewInterface;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    protected $newService;
    public $title;
    public $date;
    public $introduction;
    public $text;
    public $image;
    public $link;
    public $contact_name;
    public $contact_email;
    public $contact_phone;
    public $source_form;
    public $contact_validation;
    public $publish;

    protected $rules = [
        'title' => 'required|min:3|max:255',
        'date' => 'required|date',
        'introduction' => 'nullable|min:20|max:65000',
        'text' => 'required|min:20|max:65000',
        'image' => 'required|image|max:3072',
        'link' => 'requiredIf:source_form,1|nullable|active_url|min:3|max:255',
        'contact_name' => 'requiredIf:source_form,1|nullable|min:3|max:255',
        'contact_email' => 'requiredIf:source_form,1|nullable|email|min:3|max:255',
        'contact_phone' => 'requiredIf:source_form,1|nullable|min:3|max:13'
    ];

    protected $messages = [
        'date.date' => 'Formato de fecha no válido',
        'image.image' => 'Formato de archivo no válido (admitidos: jpg, png, gif)',
        'image.max' => 'El archivo es demasiado grande, tamaño máximo 3MB',
        'link.active_url' => 'Link no válido, incluir el prefijo https://',
        '*.min' => 'El campo debe tener al menos :min caracteres',
        '*.max' => 'El campo no debe exceder los :max caracteres',
        'contact_email.email' => 'Email no válido',
        '*.required' => 'El campo es requerido',
        '*.required_if' => 'El campo es requerido',
    ];

    public function boot(NewInterface $newService)
    {
        $this->newService = $newService;
    }

    public function mount()
    {
        $this->publish = 1;
        $this->source_form = 0;
    }

    public function render()
    {
        return view('livewire.news.create');
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function updateSource()
    {
        $this->link          = $this->source_form == 1? $this->link : null;
        $this->contact_name  = $this->source_form == 1? $this->contact_name : null;
        $this->contact_email = $this->source_form == 1? $this->contact_email : null;
        $this->contact_phone = $this->source_form == 1? $this->contact_phone : null;
    }

    public function submit()
    {
        $this->validate();

        $image = $this->image->store('news', 'public');

        $this->newService->store([
            'title'              => $this->title,
            'date'               => $this->date,
            'introduction'       => $this->introduction,
            'text'               => $this->text,
            'image'              => $image,
            'link'               => $this->link,
            'contact_name'       => $this->contact_name,
            'contact_email'      => $this->contact_email,
            'contact_phone'      => $this->contact_phone,
            'publish'            => $this->publish,
            'created_user_id'    => auth()->user()->id,
            'source_form'        => $this->source_form
        ]);

        session()->flash('success', 'Noticia creada');

        return redirect()->route('admin.news');
    }
}
