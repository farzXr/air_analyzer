<?php

namespace App\Http\Controllers\Indications;

class Index
{
    public function __invoke()
    {
        return view('Indications.index');
    }
}
