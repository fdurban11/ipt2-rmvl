<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Product routes
Route::get('products/search', [ProductController::class, 'search'])->name('products.search');
Route::get('products/filter/{status}', [ProductController::class, 'filterByStock'])->name('products.filter');
Route::resource('products', ProductController::class);
