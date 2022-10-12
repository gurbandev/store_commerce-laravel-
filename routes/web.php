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

Route::redirect('', '/products')->name('home');

Route::controller(ProductController::class)->group(function () {
    Route::get('/products', 'index')->name('products.index');
    Route::get('/products/{slug}', 'show')->name('products.show')->where('slug', '[A-Za-z0-9-]+');
});

Route::controller(CategoryController::class)->group(function () {
//    Route::get('/categories', 'index')->name('categories.index');
    Route::get('/categories/{slug}/products', 'show')->name('categories.show')->where('slug', '[A-Za-z0-9-]+');
});

Route::controller(BrandController::class)->group(function () {
//    Route::get('/brands', 'index')->name('brands.index');
    Route::get('/brands/{slug}/products', 'show')->name('brands.show')->where('slug', '[A-Za-z0-9-]+');
});