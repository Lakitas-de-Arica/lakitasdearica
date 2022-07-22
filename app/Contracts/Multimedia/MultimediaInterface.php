<?php

namespace App\Contracts\Multimedia;
use App\Models\Multimedia;
interface MultimediaInterface
{
    public function store($data);
    public function update($data, $id);
    public function generateSlug($title, $count = 0);
    public function delete($id);
    public function getFormats();
    public function getPrevious(Multimedia $multimedia);
    public function getNext(Multimedia $multimedia);
}
