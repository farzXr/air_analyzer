<?php

namespace App\Services\Indications;
use App\Models\Indications;

class DestroyService
{
    public static function destroy(Indications $indications){
        $indications->delete();
    }
}
