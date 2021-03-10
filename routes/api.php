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

//php artisan route:list

Route::post('/register', [\App\Http\Controllers\AuthController::class, 'register']);
Route::get('/login', [\App\Http\Controllers\AuthController::class, 'login'])->name('login');
Route::post('/login', [\App\Http\Controllers\AuthController::class, 'login']);

Route::group(['middleware' => 'auth:api'], function () {
    Route::post('/patient/store', [\App\Http\Controllers\PatientController::class, 'store']);
    Route::get('/patient/index', [\App\Http\Controllers\PatientController::class, 'index']);
    Route::post('/patient/update', [\App\Http\Controllers\PatientController::class, 'update']);
    Route::get('/patient/show/{id}', [\App\Http\Controllers\PatientController::class, 'show']);

    Route::get('/user/index', [\App\Http\Controllers\AuthController::class, 'index']);
});
