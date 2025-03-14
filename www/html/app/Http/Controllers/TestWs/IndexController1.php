<?php

namespace app\Http\Controllers\TestWs;

class IndexController1
{
    public function __invoke()
    {
        return view('testWs.index1');
    }
}
