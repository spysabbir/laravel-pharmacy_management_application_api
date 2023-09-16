<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CustomerController;
use App\Http\Controllers\Api\MedicineController;
use App\Http\Controllers\Api\PowerController;
use App\Http\Controllers\Api\SupplierController;
use App\Http\Controllers\Api\TypeController;
use App\Http\Controllers\Api\UnitController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::resource('suppliers', SupplierController::class);
    Route::resource('customer', CustomerController::class);
    Route::resource('type', TypeController::class);
    Route::resource('power', PowerController::class);
    Route::resource('unit', UnitController::class);
    Route::resource('medicine', MedicineController::class);

    Route::get('logout', [AuthController::class, 'logout']);
});
