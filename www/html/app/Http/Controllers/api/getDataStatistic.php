<?php

namespace app\Http\Controllers\api;

use App\Http\Requests\api\GetDataStatisticRequest;
use Illuminate\Support\Facades\DB;

class getDataStatistic
{
    public function __invoke(GetDataStatisticRequest $request)
    {
        $intervals = $request->validated();
        $data = [];
        foreach ($intervals['intervals'] as $interval) {
            $results = DB::select("
            SELECT
            AVG(value) AS average,
            MAX(value) AS maximum,
            MIN(value) AS minimum,
            SUM(CASE WHEN value > 75 THEN 1 ELSE 0 END)*15 AS summary
            FROM ch4
            WHERE dateTime >= NOW() - INTERVAL $interval");


            $data[$interval]['average'] = number_format($results[0]->average, 2);
            $data[$interval]['maximum'] = $results[0]->maximum;
            $data[$interval]['minimum'] = $results[0]->minimum;
            $data[$interval]['summary'] = $results[0]->summary;

        }

        return $data;
    }
}
