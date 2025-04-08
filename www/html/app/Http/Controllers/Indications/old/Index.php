<?php

namespace app\Http\Controllers\Indications\old;

use App\Http\Controllers\Controller;
use App\Models\Indications;
use Illuminate\Support\Facades\Schema;

class Index extends Controller
{
    public function __invoke()
    {

        $indicationsColumnNames = Schema::getColumnListing('indications');
        $indications = Indications::all();
        return view('IndicationsController.index', compact('indications', 'indicationsColumnNames'));
    }
}
