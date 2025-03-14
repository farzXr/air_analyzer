<?php

namespace app\Http\Controllers\TestWs;

class IndexController2
{
    public function __invoke()
    {
        return view('testWs.index2');
    }
}
