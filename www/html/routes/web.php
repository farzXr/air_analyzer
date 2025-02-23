<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Indications\Index;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/index', Index::class);
