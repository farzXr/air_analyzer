<?php

use App\Http\Controllers\CO\IndexController;
use App\Http\Controllers\Indications\IndicationsController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;


Route::get('/getHello', function () {
    $response = \Illuminate\Support\Facades\Http::get('http://air-analyzer-golang-1:8080/getHello');
    return  response()->json($response->json());
});

Route::get('/', function () {
    return Inertia::render('Welcome', []);
})->name('welcome');
Route::get('/indications', IndicationsController::class)->name('indications');

Route::prefix('indications')->namespace('App\Http\Controllers\Indications\CH4')->group(function () {
    Route::prefix('ch4')->name('CH4')->group(function () {
        Route::get('', CH4Controller::class);
        Route::get('statistic', Statistic\StatisticController::class)->name('.statistic');
    });
    Route::get('co2', function (){ return inertia('More/CO2/CO2'); })->name('CO2');
    Route::get('co', function (){ return inertia('More/CO/CO'); })->name('CO');
    Route::get('tvoc', function (){ return inertia('More/TVOC/TVOC'); })->name('TVOC');
    Route::get('hcho', function (){ return inertia('More/HCHO/HCHO'); })->name('HCHO');
    Route::get('temp', function (){ return inertia('More/Temp/Temp'); })->name('температура');
    Route::get('humi', function (){ return inertia('More/Humi/Humi'); })->name('влажность');
    Route::get('pm', function (){ return inertia('More/PM/PM'); })->name('PM');
});

/*Route::prefix('indications')
    ->namespace('App\\Http\\Controllers\\IndicationsController\\old')
    ->name('indications.')
    ->group(function () {
    //Route::get('', Index::class)->name('index');
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




