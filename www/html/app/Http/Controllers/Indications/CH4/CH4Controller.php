<?php

namespace app\Http\Controllers\Indications\CH4;

use App\Models\CH4;
use App\Services\CH4\ExtractValueService;

class CH4Controller
{
    public function __invoke()
    {

        $dataX[] = ExtractValueService::extract()[0];
        $dataY[] = ExtractValueService::extract()[1];



        return inertia('More/CH4/CH4', [
            'dataX' => $dataX,
            'dataY' => $dataY
        ]);
    }
}
