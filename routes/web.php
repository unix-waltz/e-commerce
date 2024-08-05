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

});


