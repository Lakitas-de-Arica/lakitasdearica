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

    protected $casts = [
        'date' => 'date'
    ];

    public function publicLink()
    {
        return route('multimedia.show',['slug' => $this->slug]);
    }

    public function dateStringFormat()
    {
        return Carbon::parse($this->date)->translatedFormat('j F Y');
    }

    public function generateEmbedVideo()
    {
        if ($this->format !== 'YOUTUBE') return null;

        return preg_replace("/\s*[a-zA-Z\/\/:\.]*youtube.com\/watch\?v=([a-zA-Z0-9\-_]+)([a-zA-Z0-9\/\*\-\_\?\&\;\%\=\.]*)/i",
                            "<iframe width=\"420\" height=\"315\" src=\"//www.youtube.com/embed/$1\" frameborder=\"0\" allowfullscreen></iframe>",
                            $this->file);
    }

    public function comparsa()
    {
        return $this->belongsTo(Comparsa::class);
    }

    public function publicImage()
    {
        if (is_null($this->image)) {
            return $this->comparsa->image;
        }

        return $this->image;
    }
}
