<?php

namespace App\Services\Comparsa;

use App\Contracts\Comparsa\ComparsaInterface;
use App\Models\Comparsa;
use Illuminate\Support\Str;

class ComparsaService implements ComparsaInterface
{
    public function store($data)
    {
        $comparsa = new Comparsa();
        $comparsa->name               = $data['name'];
        $comparsa->slug               = $this->generateSlug($data['name']);
        $comparsa->image              = $data['image'];
        $comparsa->date               = $data['date'];
        $comparsa->location           = $data['location'];
        $comparsa->members            = $data['members'];
        $comparsa->extract            = $data['extract'];
        $comparsa->text               = $data['text'];
        $comparsa->text_1             = $data['text_1'];
        $comparsa->text_2             = $data['text_2'];
        $comparsa->text_3             = $data['text_3'];
        $comparsa->text_4             = $data['text_4'];
        $comparsa->text_5             = $data['text_5'];
        $comparsa->text_6             = $data['text_6'];
        $comparsa->link               = $data['link'];
        $comparsa->web                = $data['web'];
        $comparsa->facebook           = $data['facebook'];
        $comparsa->instagram          = $data['instagram'];
        $comparsa->contact_name       = $data['contact_name'];
        $comparsa->contact_phone      = $data['contact_phone'];
        $comparsa->contact_email      = $data['contact_email'];
        $comparsa->source_form        = $data['source_form'];
        $comparsa->created_user_id    = $data['created_user_id'];
        $comparsa->publish            = $data['publish'];
        $comparsa->save();

        return $comparsa;
    }

    public function generateSlug($title, $count = 0)
    {
        $slug = $count == 0? Str::slug($title, '-') : Str::slug($title.$count, '-') ;
        $c = Comparsa::where('slug',$slug)->first();

        if ($c) {
            return $this->generateSlug($title . $count+1);
        };

        return $slug;
    }

    public function update($data, $id)
    {
        $comparsa = Comparsa::findOrFail($id);

        $comparsa->slug = trim($data['name']) === $comparsa->title? $comparsa->slug : $this->generateSlug($data['name']);

        $comparsa->name               = $data['name'];
        $comparsa->image              = $data['image'];
        $comparsa->date               = $data['date'];
        $comparsa->location           = $data['location'];
        $comparsa->members            = $data['members'];
        $comparsa->extract            = $data['extract'];
        $comparsa->text               = $data['text'];
        $comparsa->text_1             = $data['text_1'];
        $comparsa->text_2             = $data['text_2'];
        $comparsa->text_3             = $data['text_3'];
        $comparsa->text_4             = $data['text_4'];
        $comparsa->text_5             = $data['text_5'];
        $comparsa->text_6             = $data['text_6'];
        $comparsa->link               = $data['link'];
        $comparsa->web                = $data['web'];
        $comparsa->facebook           = $data['facebook'];
        $comparsa->instagram          = $data['instagram'];
        $comparsa->contact_name       = $data['contact_name'];
        $comparsa->contact_phone      = $data['contact_phone'];
        $comparsa->contact_email      = $data['contact_email'];
        $comparsa->source_form        = $data['source_form'];
        $comparsa->updated_user_id    = $data['updated_user_id'];
        $comparsa->publish            = $data['publish'];
        $comparsa->save();

        return $comparsa;
    }

    public function delete($id)
    {
        $comparsa = Comparsa::findOrFail($id);
        $multimedia = $comparsa->multimedia();

        if ($multimedia) {
            $multimedia->delete();
        }

        $comparsa->delete();
    }
}
