<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

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


Route::controller(ProductController::class)->group(function () {
    Route::get('/', 'index');
    Route::get('/product/{id}', 'show')->name('product.show')->where('id', '[0-9]+');
});

//Route::get('/', [ProductController::class, 'index']);
//Route::get('/product/{id}', [ProductController::class, 'show'])->name('product.show');
