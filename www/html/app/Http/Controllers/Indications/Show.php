<?php

namespace app\Http\Controllers\Indications;

use App\Http\Controllers\Controller;

class Show extends Controller
{
    public function __invoke()
    {
        dd('dddd');
        // TODO: Implement __invoke() method.
        return view('indications.index');
    }
}
