<?php

namespace app\Http\Controllers\CO\Statistics;

use App\Http\Controllers\Controller;
use App\Models\CO;
use Illuminate\Database\Eloquent\Model;

class MAXController extends Controller
{
    public function __invoke($period)
    {
        $statistic = CO::getStatistics('max', $period);
        $type = 'MAX '.$period;
        return response()->json(['type' => $type, 'statistic' => $statistic]);
    }
}
