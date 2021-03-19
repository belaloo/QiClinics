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
    Route::get('/patient/index/{pageSize}', [\App\Http\Controllers\PatientController::class, 'index']);
    Route::post('/patient/update', [\App\Http\Controllers\PatientController::class, 'update']);
    Route::get('/patient/show/{id}', [\App\Http\Controllers\PatientController::class, 'show']);
    Route::post('/patient/destroy', [\App\Http\Controllers\PatientController::class, 'destroy']);

    Route::get('/user/index/{pageSize}', [\App\Http\Controllers\AuthController::class, 'index']);
    Route::post('/user/update', [\App\Http\Controllers\AuthController::class, 'update']);
    Route::post('/user/changeStatus', [\App\Http\Controllers\AuthController::class, 'changeStatus']);


    Route::get('/consumable/index', [\App\Http\Controllers\ConsumableController::class, 'index']);

    Route::get('/device/index', [\App\Http\Controllers\DeviceController::class, 'index']);

    Route::get('/productsUsed/index', [\App\Http\Controllers\ProductsUsedController::class, 'index']);

    Route::get('/tratedAreas/index', [\App\Http\Controllers\TratedAreasController::class, 'index']);

    Route::get('/machine/index/{parent_id}', [\App\Http\Controllers\MachineController::class, 'index']);

    Route::post('/session/store', [\App\Http\Controllers\SessionController::class, 'store']);
    Route::get('/session/index/{pageSize}', [\App\Http\Controllers\SessionController::class, 'index']);
});
