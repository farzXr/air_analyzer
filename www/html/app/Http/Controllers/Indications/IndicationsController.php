<?php

namespace app\Http\Controllers\Indications;

use App\Models\Indications;
use Inertia\Inertia;

class IndicationsController
{
    public function __invoke()
    {
        $indications_list = Indications::all();
        return Inertia::render('Indications', ['indications_list' => $indications_list]);
    }
}
