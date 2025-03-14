<?php

namespace app\Http\Controllers\CO\API\v1;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

class GetReadingsDeviceController extends Controller
{
    public function __invoke()
    {
        $response = Http::get('https://api.air-analyzer.io/api/v1/readings');
    }
}
