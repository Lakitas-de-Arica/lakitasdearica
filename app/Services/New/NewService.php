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
        $new->title = $data['title'];
        $new->slug = $this->generateSlug($data['title']);
        $new->image = $data['image'];
        $new->date = $data['date'];
        $new->introduction = $data['introduction'];
        $new->text = $data['text'];
        $new->link = $data['link'];
        $new->publish = $data['publish'];
        $new->user_id = $data['user_id'];
        $new->contact_name = $data['contact_name'];
        $new->contact_phone = $data['contact_phone'];
        $new->contact_email = $data['contact_email'];
        $new->contact_validation = $data['contact_validation'];
        $new->save();

        return $new;
    }

    public function generateSlug($title)
    {
        return Str::slug($title, '-');
    }
}
