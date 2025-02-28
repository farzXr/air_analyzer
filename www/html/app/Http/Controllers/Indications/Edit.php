<?php

namespace app\Http\Controllers\Indications;

use App\Http\Controllers\Controller;

class Edit extends Controller
{
    public function __invoke()
    {
        // TODO: Implement __invoke() method.
        return view('indications.index');
    }
}
