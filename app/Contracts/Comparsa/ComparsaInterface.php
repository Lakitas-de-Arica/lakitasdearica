<?php

namespace App\Contracts\Comparsa;

interface ComparsaInterface
{
    public function store($data);
    public function update($data, $id);
    public function generateSlug($title, $count = 0);
}
