<?php

use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('startPage');
});

Route::prefix('indications')
    ->namespace('App\\Http\\Controllers\\Indications')
    ->name('indications.')
    ->middleware('auth')
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
    });





Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

