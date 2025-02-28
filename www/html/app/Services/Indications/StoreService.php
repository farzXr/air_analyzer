<?php

namespace app\Services\Indications;

use App\Models\Indications;

class StoreService
{
    public static function store($data)
    {
        Indications::create($data);
    }
}
