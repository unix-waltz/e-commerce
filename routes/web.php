<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CustomerController;
use Illuminate\Support\Facades\Route;
// guest
Route::get('/', [CustomerController::class,'index']);

// admin
Route::get('/admin', [AdminController::class,'index']);
Route::post('/admin/create', [AdminController::class,'_Create']);




