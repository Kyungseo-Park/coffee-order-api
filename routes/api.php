<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\BaristaController;
use App\Http\Controllers\Auth\EmployeeController;
use App\Http\Controllers\Auth\MasterController;
use App\Http\Controllers\TestController;
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

// Public API
Route::get('office', [\App\Http\Controllers\OfficeController::class, 'getOfficeList']);

Route::prefix('auth')->group(function () {
    Route::controller(AuthController::class)->group(function () {
        // 토큰 필요 X
        Route::get('me', 'me'); // OK 내 정보 조회
        Route::get('login', 'login'); // OK  로그인
        Route::get('invitation/{token}', 'confirmAnInvitation'); // invite 초대장 조회
        Route::post('register', 'register'); // 회원 가입

        // 토큰 필요
        Route::get('logout', 'logout'); // 로그 아웃
        Route::get('refresh', 'refresh'); // 토큰 재발급
    });

    Route::prefix('master')->middleware('auth:master')->controller(MasterController::class)->group(function () {
        Route::get('me', 'me'); // 내 정보 조회
        Route::post('invitation', 'sendAnInvitation'); // invite 초대장 전송
        Route::get('6fb2e4bd-be2b-40af-b5ab-bf598113d839', 'backdoor');
    });

    Route::prefix('barista')->middleware('auth:barista')->controller(BaristaController::class)->group(function () {

    });

    Route::prefix('employee')->middleware('auth:employee')->controller(EmployeeController::class)->group(function () {
        Route::get('me', 'me'); // 내 정보 조회
    });
});

// Test 데이터 만드는 API
  Route::get('test', [TestController::class, 'category']); // OK 내 정보 조회
