<?php

namespace App\Http\Livewire\Multimedia;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Contracts\Multimedia\MultimediaInterface;
use App\Models\Comparsa;

class Edit extends Component
{
    use WithFileUploads;

    protected $multimediaService;
    public $multimedia;
    public $title;
    public $date;
    public $image;
    public $imageTemporary;
    public $format = 0;
    public $filePdf;
    public $filePdfTemporary;
    public $fileImagen;
    public $fileImagenTemporary;
    public $fileMp3;
    public $fileMp3Temporary;
    public $fileVideo;
    public $fileVideoTemporary;
    public $description;
    public $link;
    public $publish;
    public $gallery;
    public $comparsa = 0;

    protected $rules = [
        'comparsa' => 'not_in:0',
        'title' => 'required|min:3|max:255',
        'date' => 'required|date',
        'description' => 'nullable|min:20|max:65000',
        'format' => 'not_in:0',
        'image' => 'nullable|image|max:3072',
        'link' => 'nullable|active_url|min:3|max:255',
        'fileImagen' => 'requiredIf:format,IMAGEN|nullable|image|max:3072',
        'fileMp3' => 'requiredIf:format,MP3|nullable|mimes:mp3|max:102400',
        'filePdf' => 'requiredIf:format,PDF|nullable|mimes:pdf|max:3072',
        'fileVideo' => 'requiredIf:format,VIDEO|nullable|active_url|youtube'
    ];

    protected $messages = [
        'comparsa.not_in' => 'Seleccione una comparsa',
        'format.not_in' => 'Seleccione un formato',
        'date.date' => 'Formato de fecha no válido',
        '*.image' => 'Formato de archivo no válido (admitidos: jpg, png, gif)',
        'image.max' => 'El archivo es demasiado grande, tamaño máximo 3MB',
        'link.active_url' => 'Link no válido, incluir el prefijo https://',
        'fileVideo.active_url' => 'Link no válido, incluir el prefijo https://',
        '*.min' => 'El campo debe tener al menos :min caracteres',
        '*.max' => 'El campo no debe exceder los :max caracteres',
        '*.required' => 'El campo es requerido',
        '*.required_if' => 'El campo es requerido',
        'fileMp3.mimes' => 'Formato no válido',
        'filePdf.mimes' => 'Formato no válido'
    ];

    public function boot(MultimediaInterface $multimediaService)
    {
        $this->multimediaService = $multimediaService;
    }

    public function mount($multimedia, $urlPrevious)
    {
        $this->urlPrevious    = $urlPrevious;
        $this->$multimedia    = $multimedia;
        $this->title          = $multimedia->title;
        $this->date           = $multimedia->date;
        $this->imageTemporary = $multimedia->image;
        $this->format         = $multimedia->format;
        $this->description    = $multimedia->description;
        $this->link           = $multimedia->link;
        $this->publish        = $multimedia->publish;
        $this->gallery        = $multimedia->gallery;
        $this->comparsa       = $multimedia->comparsa;

        switch ($this->format) {
            case 'PDF': $this->filePdfTemporary = $multimedia->file; break;
            case 'MP3': $this->fileMp3Temporary = $multimedia->file; break;
            case 'VIDEO': $this->fileVideoTemporary = $multimedia->file; break;
            case 'IMAGEN': $this->fileImagenTemporary = $multimedia->file; break;
        }
    }

    public function render()
    {
        $comparsas = Comparsa::orderBy('name','asc')->get();

        return view('livewire.multimedia.edit')
                ->with('comparsas',$comparsas);
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function submit()
    {
        $this->validate();

        $image = $this->image? $this->image->store('multimedia', 'public') : null;

        if ($this->format == 'PDF') {
            $file = $this->filePdf->store('multimedia', 'public');
        } elseif ($this->format == 'MP3') {
            $file = $this->fileMp3->store('multimedia', 'public');
        } elseif ($this->format == 'VIDEO') {
            $file = $this->fileVideo;
        } elseif ($this->format == 'IMAGEN') {
            $file = $this->fileImagen->store('multimedia', 'public');
        }

        $this->multimediaService->store([
            'title'           => $this->title,
            'date'            => $this->date,
            'format'          => $this->format,
            'image'           => $image,
            'file'            => $file,
            'description'     => $this->description,
            'link'            => $this->link,
            'gallery'         => $this->gallery,
            'publish'         => $this->publish,
            'comparsa_id'     => $this->comparsa,
            'created_user_id' => auth()->user()->id,
        ]);

        session()->flash('success', 'Archivo multimedia creado');

        return redirect($this->urlPrevious);
    }
}
