<?php

namespace app\Http\Controllers\Indications\old;

use App\Http\Controllers\Controller;
use App\Models\Indications;

class Edit extends Controller
{
    public function __invoke(Indications $indications)
    {
        $tableColumnNames =  Indications::getTableColumnNames(array('created_at', 'updated_at', 'id'));
        return view('IndicationsController.edit', compact('indications', 'tableColumnNames'));
    }
}
