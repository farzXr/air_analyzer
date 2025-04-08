<?php

namespace app\Http\Controllers\Indications\old;

use App\Http\Controllers\Controller;

class Show extends Controller
{
    public function __invoke()
    {
        return view('indications.index');
    }
}
