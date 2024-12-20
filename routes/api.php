<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UpcomingProductController;
use App\Http\Controllers\ProductController;



Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
Route::get('/upcoming-products', [UpcomingProductController::class, 'getActiveProducts']);


Route::post('/products/category', [ProductController::class, 'fetchProductsByCategory']);


Route::get('/products/recent-products', [ProductController::class, 'fetchLastSixMonthsProducts']);






