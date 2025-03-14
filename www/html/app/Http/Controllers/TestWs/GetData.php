<?php

namespace App\Http\Controllers\TestWs;

use App\Http\Controllers\Controller;
use App\Http\Resources\TestWs\GetDataResource;
use App\Models\TestWs;
use Illuminate\Http\Request;

class GetData extends Controller
{
    public function __invoke()
    {
        $testWs = TestWs::all();
        $response = GetDataResource::collection($testWs);
        return response()->json($response, 200);
    }
}
