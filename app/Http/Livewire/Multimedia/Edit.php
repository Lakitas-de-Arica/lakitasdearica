<?php

namespace App\Http\Livewire\Multimedia;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Contracts\Multimedia\MultimediaInterface;
use App\Models\Comparsa;
use App\Models\Multimedia;
use Illuminate\Validation\Validator;

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
    public $gallery_history_ch;
    public $gallery_history_vs;
    public $comparsa;

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

    public function mount(Multimedia $multimedia, $urlPrevious)
    {
        $this->urlPrevious        = $urlPrevious;
        $this->multimedia         = $multimedia;
        $this->title              = $multimedia->title;
        $this->date               = $multimedia->date? $multimedia->date->format('Y-m-d') : null;
        $this->imageTemporary     = $multimedia->image;
        $this->format             = $multimedia->format;
        $this->description        = $multimedia->description;
        $this->file               = $multimedia->file;
        $this->link               = $multimedia->link;
        $this->publish            = $multimedia->publish;
        $this->gallery            = $multimedia->gallery;
        $this->gallery_history_ch = $multimedia->gallery_history_ch;
        $this->gallery_history_vs = $multimedia->gallery_history_vs;
        $this->comparsa           = $multimedia->comparsa_id;

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

        $this->withValidator(function (Validator $validator) {
            $validator->after(function ($validator) {

                $d = $validator->getData();

                switch ($d['format']) {
                    case 'PDF':

                        if (is_null($d['filePdf']) AND is_null($d['filePdfTemporary'])) {
                            $validator->errors()->add('filePdf', 'El archivo es requerido');
                        }

                        break;
                    case 'MP3':

                        if (is_null($d['fileMp3']) AND is_null($d['fileMp3Temporary'])) {
                            $validator->errors()->add('fileMp3', 'El archivo es requerido');
                        }

                        break;
                    case 'VIDEO':

                        if (is_null($d['fileVideo']) AND is_null($d['fileVideoTemporary'])) {
                            $validator->errors()->add('fileVideo', 'El link es requerido');
                        }

                        break;
                    case 'IMAGEN':

                        if (is_null($d['fileImagen']) AND is_null($d['fileImagenTemporary'])) {
                            $validator->errors()->add('fileImagen', 'El archivo es requerido');
                        }

                    break;
                }
            });
        })->validate();

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
            'gallery_history_ch' => $this->gallery_history_ch,
            'gallery_history_vs' => $this->gallery_history_vs,
            'publish'           => $this->publish,
            'comparsa_id'       => $this->comparsa == 0? null : $this->comparsa,
            'updated_user_id'   => auth()->user()->id,
        ], $this->multimedia->id);

        session()->flash('success', 'Archivo multimedia actualizado');

        return redirect($this->urlPrevious);
    }
}
