<?php

namespace app\Http\Controllers\Indications;

use App\Http\Controllers\Controller;
use App\Models\Indications;

class Edit extends Controller
{
    public function __invoke(Indications $indications)
    {
        $tableColumnNames =  Indications::getTableColumnNames(array('created_at', 'updated_at', 'id'));
        return view('Indications.edit', compact('indications', 'tableColumnNames'));
    }
}
