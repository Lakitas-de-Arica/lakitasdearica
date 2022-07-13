<?php

namespace App\Http\Livewire\News;

use Livewire\Component;
use App\Contracts\New\NewInterface;
use Livewire\WithFileUploads;

class Edit extends Component
{
    use WithFileUploads;
    protected $newService;
    public $new;
    public $urlPrevious;
    public $title;
    public $date;
    public $introduction;
    public $text;
    public $image;
    public $current_image;
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
        'image' => 'nullable|image|max:3072',
        'link' => 'nullable|active_url|min:3|max:255',
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

    public function mount($new, $urlPrevious)
    {
        $this->new                = $new;
        $this->urlPrevious        = $urlPrevious;
        $this->title              = $new->title;
        $this->date               = $new->date->format('Y-m-d');
        $this->introduction       = $new->introduction;
        $this->text               = $new->text;
        $this->current_image      = $new->image;
        $this->link               = $new->link;
        $this->contact_name       = $new->contact_name;
        $this->contact_email      = $new->contact_email;
        $this->contact_phone      = $new->contact_phone;
        $this->source_form        = $new->source_form;
        $this->publish            = $new->publish;
    }

    public function render()
    {
        return view('livewire.news.edit');
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function updateSource()
    {
        $this->contact_name  = $this->source_form == 1? $this->new->contact_name : null;
        $this->contact_email = $this->source_form == 1? $this->new->contact_email : null;
        $this->contact_phone = $this->source_form == 1? $this->new->contact_phone : null;
    }

    public function submit()
    {
        $this->validate();

        $image = (is_null($this->image))? $this->new->image : $this->image->store('news', 'public') ;

        $this->newService->update([
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
            'updated_user_id'    => auth()->user()->id,
            'source_form'        => $this->source_form
        ], $this->new->id);

        session()->flash('success', 'Noticia actualizada');

        return redirect($this->urlPrevious);
    }
}
