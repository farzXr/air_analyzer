<?php

namespace app\Http\Controllers\Indications;

use App\Http\Controllers\Controller;
use App\Models\Indications;
use Illuminate\Support\Facades\Schema;

class Create extends Controller
{
    public function __invoke()
    {
        $indicationsColumnNames = Schema::getColumnListing('indications');
        return view('Indications.create', compact('indicationsColumnNames'));
    }
}
