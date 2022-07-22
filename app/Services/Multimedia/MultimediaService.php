<?php

namespace App\Services\Multimedia;

use App\Contracts\Multimedia\MultimediaInterface;
use App\Models\Multimedia;
use Illuminate\Support\Str;

class MultimediaService implements MultimediaInterface
{
    public function store($data)
    {
        $multimedia = new Multimedia();
        $multimedia->title           = $data['title'];
        $multimedia->slug            = $this->generateSlug($data['title']);
        $multimedia->image           = $data['image'];
        $multimedia->date            = $data['date'];
        $multimedia->format          = $data['format'];
        $multimedia->file            = $data['file'];
        $multimedia->description     = $data['description'];
        $multimedia->link            = $data['link'];
        $multimedia->publish         = $data['publish'];
        $multimedia->comparsa_id     = $data['comparsa_id'];
        $multimedia->created_user_id = $data['created_user_id'];
        $multimedia->save();

        return $multimedia;
    }

    public function update($data, $id)
    {
        $multimedia = Multimedia::findOrFail($id);
        $multimedia->slug            = $data['title'] !== $multimedia->title? $this->generateSlug($data['title']) : $multimedia->slug;
        $multimedia->title           = $data['title'];
        $multimedia->image           = $data['image'];
        $multimedia->date            = $data['date'];
        $multimedia->format          = $data['format'];
        $multimedia->file            = $data['file'];
        $multimedia->description     = $data['description'];
        $multimedia->link            = $data['link'];
        $multimedia->publish         = $data['publish'];
        $multimedia->comparsa_id     = $data['comparsa_id'];
        $multimedia->updated_user_id = $data['updated_user_id'];
        $multimedia->save();

        return $multimedia;
    }

    public function generateSlug($title, $count = 0)
    {
        $slug = $count == 0? Str::slug($title, '-') : Str::slug($title.$count, '-') ;
        $c = Multimedia::where('slug',$slug)->first();

        if ($c) {
            return $this->generateSlug($title . $count+1);
        };

        return $slug;
    }

    public function delete($id)
    {
        Multimedia::findOrFail($id)->delete();
    }

    public function getFormats()
    {
        return config('multimedia.formats');
    }

    public function getPrevious(Multimedia $multimedia)
    {
        $previous = Multimedia::where('created_at','<',$multimedia->created_at)
                        ->orderBy('created_at','desc')
                        ->get()
                        ->first();

        if ($previous) return $previous;

        return null;
    }

    public function getNext(Multimedia $multimedia)
    {
        $next = Multimedia::where('created_at','>',$multimedia->created_at)
                        ->orderBy('created_at','asc')
                        ->get()
                        ->first();

        if ($next) return $next;

        return null;
    }
}
