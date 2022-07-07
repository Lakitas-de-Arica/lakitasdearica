<?php

namespace App\Services\Comparsa;

use App\Contracts\Comparsa\ComparsaInterface;
use App\Models\Comparsa;

class ComparsaService implements ComparsaInterface
{
    public function store($data)
    {
        $comparsa = new Comparsa();
        $comparsa->save();

        return $comparsa;
    }
}
