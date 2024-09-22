<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;

// Route untuk halaman utama
Route::get('/', function () {
    return view('index'); // Pastikan file index.blade.php ada di resources/views
});

// Route untuk Products
Route::get('/products', [ProductController::class, 'index'])->name('products.index');

// Route untuk Orders
Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
