<?php

namespace app\Http\Controllers\CO\Statistics;

use App\Http\Controllers\Controller;
use App\Models\CO;
use Illuminate\Database\Eloquent\Model;

class AVGController extends Controller
{
    public function __invoke($period)
    {
        $statistic = CO::getStatistics('avg', $period);
        $type = 'AVG '.$period;
        /*return redirect()->route('co.index')->with([
            'type' => $type,
            'statistic' => $statistic,
        ]);*/
        return response()->json(['type' => $type, 'statistic' => $statistic]);
    }
}
