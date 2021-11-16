<?php

use Illuminate\Http\Request;
use App\Helpers\DatatableCars;
use App\Http\Controllers\CarsController;
use Illuminate\Http\JsonResponse;
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

// It's not REST API endpoint! It's Yajra datatable component
Route::get('/datatable-cars', function (Request $request): JsonResponse {
    return DatatableCars::getJSON($request);
})->name('datatable.cars');

// Cars endpoints
Route::post('/cars', [CarsController::class, 'store']);
Route::put('/cars/{id}', [CarsController::class, 'update']);
Route::delete('/cars/{id}', [CarsController::class, 'destroy']);
