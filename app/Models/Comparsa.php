<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;
use Illuminate\Support\Str;

class Comparsa extends Model
{
    use SoftDeletes;
    use HasFactory;

    protected $casts = [
        'date' => 'date'
    ];

    public function publicLink()
    {
        return route('comparsa.show',['slug' => $this->slug]);
    }

    public function dateStringFormat()
    {
        return Carbon::parse($this->date)->translatedFormat('j F Y');
    }

    public function membersListFormat()
    {
        return Str::replace(',', '<br>', $this->members);
    }
}
