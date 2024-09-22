<?php

// namespace App\Http\Controllers;

// use App\Models\Product;
// use Illuminate\Http\JsonResponse;

// class ProductController extends Controller
// {
//     public function index(): JsonResponse
//     {
//         $products = Product::all();

//         return response()->json([
//             'message' => 'Product List',
//             'data' => $products
//         ]);
//     }
// }

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function index(): View
    {
        $products = Product::all();
        return view('products.index', ['products' => $products]); // Memanggil view dari subdirektori
    }
}



