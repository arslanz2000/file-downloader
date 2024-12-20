<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UpcomingProductController;



// Route::get('/', [ProductController::class, 'showProducts'])->name('products.index'); 


Route::get('/', [ProductController::class, 'index'])->name('admin.products.index'); 
Route::prefix('admin')->group(function () {
    Route::get('/products/create', [ProductController::class, 'create'])->name('products.create'); 
    Route::post('/products', [ProductController::class, 'store'])->name('products.store'); 
    Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->name('products.edit'); 
    Route::put('/products/{id}', [ProductController::class, 'update'])->name('products.update'); 
    Route::get('/product/{id}', [ProductController::class, 'show'])->name('products.show');
    Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('products.destroy'); 
    Route::get('/products/category/{type}', [ProductController::class, 'allproduct'])->name('products.category');
    Route::resource('upcoming-products', UpcomingProductController::class);

});


