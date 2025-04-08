<?php

namespace app\Http\Controllers\Indications\old;

use App\Http\Controllers\Controller;
use App\Models\Indications;

class Create extends Controller
{
    public function __invoke()
    {
        $indicationsColumnNames = Indications::getTableColumnNames(['created_at', 'updated_at', 'id']);
        return view('IndicationsController.create', compact('indicationsColumnNames'));
    }
}
