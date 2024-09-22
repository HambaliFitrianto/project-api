<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    // Menampilkan daftar semua pesanan
    public function index()
    {
        $orders = Order::with('products')->get();
        return response()->json([
            'message' => 'Order List',
            'data' => $orders,
        ]);
    }

    // Menyimpan pesanan baru
    public function store(Request $request)
    {
        $request->validate([
            'products' => 'required|array',
        ]);

        $order = Order::create();

        foreach ($request->products as $productData) {
            $order->products()->attach($productData['id'], [
                'quantity' => $productData['quantity'],
                'price' => $productData['price'],
                'stock' => $productData['stock'],
                'sold' => $productData['sold'],
            ]);
        }

        return response()->json([
            'message' => 'Order created successfully',
            'data' => $order,
        ], 201);
    }

    // Menampilkan detail pesanan tertentu
    public function show($id)
    {
        $order = Order::with('products')->findOrFail($id);
        return response()->json([
            'message' => 'Order Detail',
            'data' => $order,
        ]);
    }
}
