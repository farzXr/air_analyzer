<?php

namespace app\Http\Controllers\TestWs;

use App\Events\TestWsEvent;
use App\Http\Requests\TestWs\SendDataRequest;
use App\Http\Resources\TestWs\SendDataResouces;
use App\Models\TestWs;

class SendData
{
    public function __invoke(SendDataRequest $request)
    {
        $data = $request->validated();
        $testWs = TestWs::create($data);
        $response = new SendDataResouces($testWs);
        event(new TestWsEvent($testWs));
        //return redirect()->route('testWs.index2');
        return response()->json($response, 200);
        //return view('testWs.index2');
    }
}
