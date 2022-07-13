<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class News extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $casts = [
        'date' => 'date'
    ];

    public function publicLink()
    {
        return route('news.show',['slug' => $this->slug]);
    }

    public function dateStringFormat()
    {
        return Carbon::parse($this->date)->translatedFormat('j F Y');
    }
}
