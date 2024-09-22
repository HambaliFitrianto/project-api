<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;

// Route untuk halaman utama
Route::get('/', function () {
    return view('index');
});

// Route untuk Products
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create'); // Form tambah produk
Route::post('/products', [ProductController::class, 'store'])->name('products.store'); // Simpan produk baru
Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit'); // Menampilkan form edit produk
Route::put('/products/{product}', [ProductController::class, 'update'])->name('products.update'); // Update produk
Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy'); // Hapus produk

// Route untuk Orders
Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
Route::post('/orders', [OrderController::class, 'store'])->name('orders.store'); // Menyimpan pesanan baru
Route::get('/orders/{order}', [OrderController::class, 'show'])->name('orders.show'); // Detail pesanan
Route::delete('/orders/{order}', [OrderController::class, 'destroy'])->name('orders.destroy'); // Hapus pesanan
