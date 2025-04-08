<?php

namespace app\Http\Controllers\Indications\old;

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
        return view('IndicationsController.show', compact('indications', 'columnName'));
    }
}
