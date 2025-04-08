<?php

namespace app\Http\Controllers\Indications\old;

use App\Http\Controllers\Controller;
use App\Http\Requests\Indications\Store as StoreRequest;
use App\Services\Indications\StoreService;

class Store extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        StoreService::store($data);
        return redirect()->route('indications.index');
    }
}
