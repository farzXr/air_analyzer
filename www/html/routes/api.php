<?php

use App\Http\Controllers\api\getDataStatistic;
use Illuminate\Support\Facades\Route;

Route::prefix('api')
    ->namespace('App\\Http\\Controllers\\api\\CH4\\getDataChart')
    ->name('api.')
    ->group(function () {
    Route::get('getWeek/{interval}', getWeek::class)->name('getWeek');
});

Route::post('api/getStatistic', getDataStatistic::class)->name('getStatistic');
