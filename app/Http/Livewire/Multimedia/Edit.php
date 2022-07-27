<?php

namespace App\Http\Livewire\Multimedia;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Contracts\Multimedia\MultimediaInterface;
use App\Models\Comparsa;
use App\Models\Multimedia;

class Edit extends Component
{
    use WithFileUploads;

    protected $multimediaService;
    public $multimedia;
    public $title;
    public $date;
    public $image;
    public $imageTemporary;
    public $format;
    public $file;
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
    public $gallery_history_1;
    public $gallery_history_2;
    public $comparsa;

    protected $rules = [
        'comparsa' => 'not_in:0',
        'title' => 'required|min:3|max:255',
        'date' => 'required|date',
        'description' => 'nullable|min:20|max:65000',
        'format' => 'not_in:0',
        'image' => 'nullable|image|max:3072',
        'link' => 'nullable|active_url|min:3|max:255',
        'fileImagen' => 'nullable|image|max:3072',
        'fileMp3' => 'nullable|mimes:mp3|max:102400',
        'filePdf' => 'nullable|mimes:pdf|max:3072',
        'fileVideo' => 'nullable|active_url|youtube'
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

    public function mount(Multimedia $multimedia, $urlPrevious)
    {
        $this->urlPrevious       = $urlPrevious;
        $this->multimedia        = $multimedia;
        $this->title             = $multimedia->title;
        $this->date              = $multimedia->date->format('Y-m-d');
        $this->imageTemporary    = $multimedia->image;
        $this->format            = $multimedia->format;
        $this->description       = $multimedia->description;
        $this->file              = $multimedia->file;
        $this->link              = $multimedia->link;
        $this->publish           = $multimedia->publish;
        $this->gallery           = $multimedia->gallery;
        $this->gallery_history_1 = $multimedia->gallery_history_1;
        $this->gallery_history_2 = $multimedia->gallery_history_2;
        $this->comparsa          = $multimedia->comparsa_id;

        $this->filePdf    = null;
        $this->fileVideo  = null;
        $this->fileMp3    = null;
        $this->fileImagen = null;

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
            $file = (is_null($this->filePdf))? $this->file : $this->filePdf->store('multimedia', 'public');
        } elseif ($this->format == 'MP3') {
            $file = (is_null($this->fileMp3))? $this->file : $this->fileMp3->store('multimedia', 'public');
        } elseif ($this->format == 'VIDEO') {
            $file = (is_null($this->fileVideo))? $this->file : $this->fileVideo;
        } elseif ($this->format == 'IMAGEN') {
            $file = (is_null($this->fileImagen))? $this->file : $this->fileImagen->store('multimedia', 'public');
        }

        $this->multimediaService->update([
            'title'             => $this->title,
            'date'              => $this->date,
            'format'            => $this->format,
            'image'             => $image,
            'file'              => $file,
            'description'       => $this->description,
            'link'              => $this->link,
            'gallery'           => $this->gallery,
            'gallery_history_1' => $this->gallery_history_1,
            'gallery_history_2' => $this->gallery_history_2,
            'publish'           => $this->publish,
            'comparsa_id'       => $this->comparsa,
            'updated_user_id'   => auth()->user()->id,
        ], $this->multimedia->id);

        session()->flash('success', 'Archivo multimedia actualizado');

        return redirect($this->urlPrevious);
    }
}
