<?php

namespace app\Http\Controllers\Indications;

use App\Http\Controllers\Controller;
use App\Http\Requests\Indications\UpdateRequest;
use App\Models\Indications;
use App\Services\Indications\UpdateService;

class Update extends Controller
{
    public function __invoke(Indications $indications, UpdateRequest $request)
    {
        $data = $request->validated();
        UpdateService::update($indications, $data);
        $columnName = Indications::getTableColumnNames();
        return view('Indications.show', compact('indications', 'columnName'));
    }
}
