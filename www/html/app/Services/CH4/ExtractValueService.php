<?php

namespace app\Services\CH4;

use App\Models\CH4;

class ExtractValueService
{
    public static function extract()
    {
        $data = CH4::all();
        $dataX = [];
        $dataY = [];
        foreach ($data as $item) {
            $dataX[] = $item['dateTime'];
            $dataY[] = $item['value'];
        }
        return [$dataX, $dataY];
    }
}
