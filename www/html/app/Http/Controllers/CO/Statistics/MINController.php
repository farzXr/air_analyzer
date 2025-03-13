<?php

namespace app\Http\Controllers\CO\Statistics;

use App\Http\Controllers\Controller;
use App\Models\CO;
use Illuminate\Database\Eloquent\Model;

class MINController extends Controller
{
    public function __invoke($period)
    {
        $statistic = CO::getStatistics('min', $period);
        $type = 'MIN '.$period;
        return response()->json(['type' => $type, 'statistic' => $statistic]);
    }
}
