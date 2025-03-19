<?php

namespace app\Http\Controllers\Indications;

use App\Http\Controllers\Controller;
use App\Models\Indications;
use Illuminate\Support\Facades\Schema;

class Index2 extends Controller
{
    public function __invoke()
    {

        $indicationsColumnNames = Schema::getColumnListing('indications');
        $indications = Indications::all();
        return view('Indications.index', compact('indications', 'indicationsColumnNames'));
    }
}
