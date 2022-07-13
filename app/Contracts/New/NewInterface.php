<?php

namespace App\Contracts\New;

interface NewInterface
{
    public function store($data);
    public function update($data, $id);
    public function generateSlug($title, $count = 0);
}
