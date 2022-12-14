<?php

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

Route::get('/',[\App\Http\Controllers\ProductController::class,'home']);

Route::get('/product_details', function () {
    return view('product_details');
});

Route::get('/account', function () {
    return view('account');
})->name('account');

Route::get('/cart', [\App\Http\Controllers\ProductController::class,'viewCart']);

Route::get('/admin_products', [\App\Http\Controllers\ProductController::class,'addProduct'])->middleware('auth');


Route::resource('/products', \App\Http\Controllers\ProductController::class);

Route::resource('/users', \App\Http\Controllers\UserController::class);

Route::post('add-to-cart',[\App\Http\Controllers\ProductController::class,'addToCart']);
Route::get('/remove-item/{rowId}', [\App\Http\Controllers\ProductController::class,'removeItem']);