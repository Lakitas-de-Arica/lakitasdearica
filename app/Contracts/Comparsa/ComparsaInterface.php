<?php

namespace App\Contracts\Comparsa;

interface ComparsaInterface
{
    public function store($data);
    public function generateSlug($title, $count = 0);
}
