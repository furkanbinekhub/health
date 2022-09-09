<?php

use Illuminate\Http\Request;
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
Route::post('user/login', [\App\Http\Controllers\Api\Auth\UserAuthController::class, 'login']);
Route::post('clinic/login', [\App\Http\Controllers\Api\Auth\ClinicAuthController::class, 'login']);

Route::group(['middleware' => ['auth:sanctum']], function () {

});

Route::group(['middleware' => ['auth:sanctum', 'auth:clinic']], function () {

    Route::group(['prefix' => 'clinic'], function () {
        Route::get('get-treatments', [\App\Http\Controllers\Api\Backend\ClinicController::class, 'getTreatments']);
        Route::post('doctor-treatment-store', [\App\Http\Controllers\Api\Backend\ClinicController::class, 'doctorTreatmentStore']);
        Route::get('{treatment}/get-doctors', [\App\Http\Controllers\Api\Backend\ClinicController::class, 'getTreatments']);
        Route::put('{clinic}', [\App\Http\Controllers\Api\Backend\ClinicController::class, 'update']);
    });
});
