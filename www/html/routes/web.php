<?php

use App\Http\Controllers\CO\IndexController;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('startPage.welcome');
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

/*Route::namespace('App\\Http\\Controllers\\Auth')
    ->group(function () {
    Route::get('/login', LoginController::class)->name('login')->middleware('guest');
    Route::get('/verify', VerificationController::class)->name('verify')->middleware('guest');
});*/

/**
 * model CO
 */
Route::prefix('co')
    ->namespace('App\\Http\\Controllers\\CO')
    ->name('co.')
    ->group(function () {

        Route::get('', IndexController::class)->name('index');

        Route::prefix('statistics')
            ->name('statistics.')
            ->group(function () {
                Route::get('avg/{period}', \Statistics\AVGController::class)->name('avg');
                Route::get('max/{period}', \Statistics\MAXController::class)->name('max');
                Route::get('min/{period}', \Statistics\MINController::class)->name('min');
            });

        Route::prefix('api')
            ->name('api.')
            ->group(function () {
                Route::get('getReadingDevice', );
            });
    });

Route::prefix('testWs')
    ->namespace('App\\Http\\Controllers\\TestWs')
    ->name('testWs.')
    ->group(function () {
        Route::get('index1', IndexController1::class)->name('index1');
        Route::get('index2', IndexController2::class)->name('index2');
        Route::post('sendData', SendData::class)->name('sendData');
        Route::get('getData', GetData::class)->name('getData');
    });





Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();




