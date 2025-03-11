<?php

namespace App\Services\CO;

use App\Models\CO;
use Carbon\Carbon;

class StatisticService
{
    public static function getStatisticsAVG($period) {
        return CO::where('time', '>=', Carbon::now()->sub($period))
            ->selectRaw('AVG(value) as avg_value')
            ->first();
    }

    public static function getStatisticsMAX($period) {
        return CO::where('time', '>=', Carbon::now()->sub($period))
            ->selectRaw('MAX(value) as max_value')
            ->first();
    }

    public static function getStatisticsMIN($period) {
        return CO::where('time', '>=', Carbon::now()->sub($period))
            ->selectRaw('MIN(value) as min_value')
            ->first();
    }
}
