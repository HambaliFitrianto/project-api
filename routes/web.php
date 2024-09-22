<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;

Route::get('/', function () {
    return view('welcome');
});

// Products endpoint
Route::get('/products', [ProductController::class, 'index']);

// Orders endpoint
Route::get('/orders', [OrderController::class, 'index']);
