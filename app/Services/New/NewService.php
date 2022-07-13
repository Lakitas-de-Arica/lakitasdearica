<?php

namespace App\Services\New;

use App\Contracts\New\NewInterface;
use App\Models\News;
use Illuminate\Support\Str;

class NewService implements NewInterface
{
    public function store($data)
    {
        $new = new News();
        $new->title              = $data['title'];
        $new->slug               = $this->generateSlug($data['title']);
        $new->image              = $data['image'];
        $new->date               = $data['date'];
        $new->introduction       = $data['introduction'];
        $new->text               = $data['text'];
        $new->link               = $data['link'];
        $new->publish            = $data['publish'];
        $new->created_user_id    = $data['created_user_id'];
        $new->contact_name       = $data['contact_name'];
        $new->contact_phone      = $data['contact_phone'];
        $new->contact_email      = $data['contact_email'];
        $new->source_form        = $data['source_form'];
        $new->save();

        return $new;
    }

    public function generateSlug($title, $count = 0)
    {
        $slug = $count == 0? Str::slug($title, '-') : Str::slug($title.$count, '-') ;
        $c = News::where('slug',$slug)->first();

        if ($c) {
            return $this->generateSlug($title . $count+1);
        };

        return $slug;
    }

    public function update($data, $id)
    {
        $new = News::findOrFail($id);
        $new->slug               = $data['title'] !== $new->title? $this->generateSlug($data['title']) : $new->slug;
        $new->title              = $data['title'];
        $new->image              = $data['image'];
        $new->date               = $data['date'];
        $new->introduction       = $data['introduction'];
        $new->text               = $data['text'];
        $new->link               = $data['link'];
        $new->publish            = $data['publish'];
        $new->updated_user_id    = $data['updated_user_id'];
        $new->contact_name       = $data['contact_name'];
        $new->contact_phone      = $data['contact_phone'];
        $new->contact_email      = $data['contact_email'];
        $new->source_form        = $data['source_form'];
        $new->save();

        return $new;
    }

    public function delete($id)
    {
        News::findOrFail($id)->delete();
    }
}
