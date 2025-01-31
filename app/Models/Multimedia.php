<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class Multimedia extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'title',
        'slug',
        'image',
        'date',
        'format',
        'file',
        'description',
        'link',
        'publish',
        'gallery',
        'gallery_history_ch',
        'gallery_history_vs',
        'comparsa_id',
        'created_user_id',
        'updated_user_id'
    ];

    protected $casts = [
        'date' => 'date'
    ];

    public function publicLink()
    {
        return route('multimedia.show',['slug' => $this->slug]);
    }

    public function dateStringFormat()
    {
        return is_null($this->date)? null : Carbon::parse($this->date)->translatedFormat('j F Y');
    }

    public function generateEmbedVideo()
    {
        if ($this->format !== 'VIDEO') return null;

        return preg_replace("/\s*[a-zA-Z\/\/:\.]*youtube.com\/watch\?v=([a-zA-Z0-9\-_]+)([a-zA-Z0-9\/\*\-\_\?\&\;\%\=\.]*)/i",
                            "<iframe width=\"100%\" height=\"315\" src=\"//www.youtube.com/embed/$1\" frameborder=\"0\" allowfullscreen></iframe>",
                            $this->file);
    }

    public function comparsa()
    {
        return $this->belongsTo(Comparsa::class);
    }

    public function publicImage()
    {
        if (is_null($this->image)) {
            if($this->comparsa) {
                return $this->comparsa->image;
            } else {
                return 'temp-file.jpg';
            }
        }

        return $this->image;
    }

    public function getFile()
    {
        switch ($this->format) {
            case 'PDF':

                return '<a href="'.asset('storage/'.$this->file).'" class="btn btn-primary" target="_blank">Descargar PDF</a>';

                break;

            case 'DOC':

                return '<a href="'.asset('storage/'.$this->file).'" class="btn btn-primary" target="_blank">Descargar DOC</a>';

                break;

            case 'MP3':

                return '<audio controls>
                            <source src="'.asset('storage/'.$this->file).'" type="audio/mpeg">
                            Su navegador no es compatible con el elemento de audio
                        </audio>';

                break;

            case 'WAV':

                return '<audio controls>
                            <source src="'.asset('storage/'.$this->file).'" type="audio/wav">
                            Su navegador no es compatible con el elemento de audio
                        </audio>';

                break;


            case 'VIDEO':

                return $this->generateEmbedVideo();

                break;

            case 'IMAGEN':

                return '<img src="'.asset('storage/'.$this->file).'" class="img-fluid">';

                break;

            default:
                return null;
        }
    }
}
