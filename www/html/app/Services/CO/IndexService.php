<?php

namespace app\Services\CO;

use App\Models\CO;

class IndexService
{
    public static function getAllTable()
    {
        return CO::paginate(10);
    }
}
