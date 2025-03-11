<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;
use App\Services\CO\StatisticService;

class CO extends Model
{
    use HasFactory;
    protected $table = 'CO';
    protected $guarded = false;

    public static function getColumnNames(array $expect): array
    {
        $answer = [];
        foreach (Schema::getColumnListing('CO') as $columnName){
            if(!in_array($columnName, $expect)){$answer[] = $columnName;}
        }
        return $answer;
    }

    public static function getStatistics(string $type, string $period){
        switch ($type){
            case 'avg': return StatisticService::getStatisticsAVG($period)->avg_value;
            case 'min': return StatisticService::getStatisticsMIN($period)->min_value;
            case 'max': return StatisticService::getStatisticsMAX($period)->max_value;
            default: return 0;
        }
    }
}
