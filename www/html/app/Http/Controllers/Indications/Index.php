<?php

namespace App\Http\Controllers\Indications;

use App\Models\Indications;

class Index
{
    public function __invoke()
    {
        $indications = Indications::all();
        return view('Indications.index', compact('indications'));
    }
}
