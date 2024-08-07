<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CustomerController;
use App\Http\Middleware\isAdmin;
use Illuminate\Support\Facades\Route;
// guest
Route::get('/', [CustomerController::class,'index']);
Route::get('/logout', [AuthController::class,'logout']);


Route::middleware([isAdmin::class,'auth'])->group(function () {
    // ...admin
Route::get('/admin', [AdminController::class,'index']);
Route::post('/admin/create', [AdminController::class,'_Create']);
Route::get('/admin/product/{slug:slug}', [AdminController::class,'ProductDetail']);
Route::post('/admin/product/edit', [AdminController::class,'_productedit']);
Route::get('/admin/delete/{slug:slug}', [AdminController::class,'ProductDelete']);
Route::get('/admin/product/status/{status}/{slug}', [AdminController::class,'StatusUpdate']);
});

Route::middleware(['guest'])->group(function () {
// Auth
Route::get('/login', [AuthController::class,'login'])->name('login');
Route::post('/login', [AuthController::class,'_login']);
Route::get('/register', [AuthController::class,'register']);
Route::post('/register', [AuthController::class,'_register']);
});

Route::middleware(['auth'])->group(function () {
// Customer
Route::get('/product/detail/{slug:slug}', [CustomerController::class,'detail']);
Route::get('/cart', [CustomerController::class,'cart']);
Route::post('/cart', [CustomerController::class,'_cart']);
Route::post('/update/cart-quantity', [CustomerController::class,'cart_update_quantity']);
Route::post('/update/cart-remove', [CustomerController::class,'cart_update_remove']);
Route::get('/wishlist', [CustomerController::class,'wishlist']);
Route::post('/wishlist', [CustomerController::class,'_wishlist']);
// Route::post('/checkout', [CustomerController::class,'checkout']);
Route::get('/invoice', [CustomerController::class,'invoice']);
Route::get('/checkout/{status}', [CustomerController::class,'_checkout'])->name('checkout_proccess');

});


