<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
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
    Route::get('/', 'index')
        ->name('home');
    Route::get('/products/{slug}', 'show')
        ->name('products.show')->where('slug', '[A-Za-z0-9-]+');
});

Route::get('/categories/{slug}/products', [CategoryController::class, 'show'])
    ->name('categories.show')->where('slug', '[A-Za-z0-9-]+');

Route::get('/brands/{slug}/products', [BrandController::class, 'show'])
    ->name('brands.show')->where('slug', '[A-Za-z0-9-]+');