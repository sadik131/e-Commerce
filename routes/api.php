<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

// product
Route::resource('/products', ProductController::class);
Route::resource('/categories', CategorieController::class);
Route::resource('/brands', BrandController::class);