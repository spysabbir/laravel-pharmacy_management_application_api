<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CustomerController;
use App\Http\Controllers\Api\MedicineController;
use App\Http\Controllers\Api\PowerController;
use App\Http\Controllers\Api\PurchasesController;
use App\Http\Controllers\Api\RackController;
use App\Http\Controllers\Api\SalesController;
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
    Route::resource('supplier', SupplierController::class);
    Route::resource('customer', CustomerController::class);
    Route::resource('type', TypeController::class);
    Route::resource('power', PowerController::class);
    Route::resource('unit', UnitController::class);
    Route::resource('rack', RackController::class);
    Route::resource('medicine', MedicineController::class);

    Route::resource('purchase', PurchasesController::class);
    Route::resource('sale', SalesController::class);

    Route::get('logout', [AuthController::class, 'logout']);

    Route::get('overview', [AuthController::class, 'overview']);

    Route::get('profile', [AuthController::class, 'profile']);
    Route::patch('profile/update', [AuthController::class, 'profileUpdate']);
    Route::put('password/update', [AuthController::class, 'passwordUpdate']);
});
