<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::prefix('indications')
    ->namespace('App\\Http\\Controllers\\Indications')
    ->name('indications.')
    ->group(function () {
    Route::get('', Index::class)->name('index');
    Route::get('/create', Create::class)->name('create');
    Route::post('', Store::class)->name('store');
    Route::get('/{indications}', Show::class)->name('show');
    Route::get('/{indications}/edit', Edit::class)->name('edit');
    Route::put('/{indications}', Update::class)->name('update');
    Route::delete('/{indications}', Destroy::class)->name('destroy');
});


