<?php

namespace App\Http\Livewire\Multimedia;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Contracts\Multimedia\MultimediaInterface;
use App\Models\Comparsa;

class Create extends Component
{
    use WithFileUploads;

    protected $multimediaService;
    public $title;
    public $date;
    public $image = null;
    public $format = 0;
    public $filePdf;
    public $fileImagen;
    public $fileMp3;
    public $fileVideo;
    public $description;
    public $link;
    public $publish;
    public $gallery;
    public $gallery_history_ch;
    public $gallery_history_vs;
    public $comparsa = 0;
    public $loadComparsa = false;

    protected $rules = [
        'comparsa' => 'nullable',
        'title' => 'required|min:3|max:255',
        'date' => 'nullable|date',
        'description' => 'nullable|min:20|max:65000',
        'format' => 'not_in:0',
        'image' => 'nullable|image|max:3072',
        'link' => 'nullable|active_url|min:3|max:255',
        'fileImagen' => 'requiredIf:format,IMAGEN|nullable|image|max:102400',
        'fileMp3' => 'requiredIf:format,MP3|nullable|mimes:mp3,wav|max:102400',
        'filePdf' => 'requiredIf:format,PDF|nullable|mimes:pdf|max:102400',
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

    public function mount($urlPrevious, $comparsa_id = null)
    {
        $this->urlPrevious = $urlPrevious;
        $this->publish = 1;
        $this->gallery = 0;
        $this->gallery_history_ch = 0;
        $this->gallery_history_vs = 0;
        $this->comparsa = $comparsa_id;
        $this->loadComparsa = is_null($comparsa_id)? false : Comparsa::findOrFail($comparsa_id);
    }

    public function render()
    {
        $comparsas = Comparsa::orderBy('name','asc')->get();

        return view('livewire.multimedia.create')
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
            'title'              => $this->title,
            'date'               => $this->date,
            'format'             => $this->format,
            'image'              => $image,
            'file'               => $file,
            'description'        => $this->description,
            'link'               => $this->link,
            'gallery'            => $this->gallery,
            'gallery_history_ch' => $this->gallery_history_ch,
            'gallery_history_vs' => $this->gallery_history_vs,
            'publish'            => $this->publish,
            'comparsa_id'        => $this->comparsa == 0? null : $this->comparsa,
            'created_user_id'    => auth()->user()->id,
        ]);

        session()->flash('success', 'Archivo multimedia creado');

        return redirect($this->urlPrevious);
    }
}
