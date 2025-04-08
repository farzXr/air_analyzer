<?php

namespace app\Http\Controllers\api\CH4\getDataChart;

use Illuminate\Support\Facades\DB;

class getWeek
{
    public function __invoke($interval)
    {
        $results = DB::select("
        SELECT * FROM ch4
        WHERE dateTime >= NOW() - INTERVAL $interval");

        $dataX = [];
        $dataY = [];
        foreach ($results as $item) {
            $dataX[] = $item->dateTime;
            $dataY[] = $item->value;
        }
        return ['dataX' => $dataX, 'dataY' => $dataY];
    }
}
