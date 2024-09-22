<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\JsonResponse;

class ProductController extends Controller
{
    public function index(): JsonResponse
    {
        $products = Product::all(); // Ambil semua produk

        return response()->json([
            'message' => 'Product List',
            'data' => $products
        ]);
    }
}
