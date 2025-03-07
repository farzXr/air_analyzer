<?php

namespace app\Services\Indications;

use App\Models\Indications;

class UpdateService
{
    public static function update(Indications $indications, $data)
    {
        $indications->update($data);
    }
}
