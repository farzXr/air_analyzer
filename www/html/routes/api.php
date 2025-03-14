<?php

use Illuminate\Support\Facades\Route;

Route::prefix('api/co/v1')
    ->namespace('App\\Http\\Controllers\\CO\\API\\v1')
    ->name('co.api')
    ->group(function () {
        Route::get('getCoValue', GetReadingsDeviceController::class)->name('getCoValue');
    });
