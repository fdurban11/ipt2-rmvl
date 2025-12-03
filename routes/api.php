<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// API Product routes
Route::get('/products', [ProductController::class, 'apiIndex']);
Route::post('/products', [ProductController::class, 'apiStore']);
Route::get('/products/{product}', [ProductController::class, 'apiShow']);
Route::put('/products/{product}', [ProductController::class, 'apiUpdate']);
Route::delete('/products/{product}', [ProductController::class, 'apiDestroy']);
