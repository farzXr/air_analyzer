<?php

namespace app\Http\Controllers\Indications\old;

use App\Http\Controllers\Controller;
use App\Models\Indications;
use App\Services\Indications\DestroyService;

class Destroy extends Controller
{
    public function __invoke(Indications $indications)
    {
        DestroyService::destroy($indications);
        return redirect()->route('indications.index');
    }
}
