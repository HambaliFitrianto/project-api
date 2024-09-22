<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    // Menampilkan daftar semua pesanan dan produk
    public function index()
    {
        $orders = Order::with('products')->get();
        $products = Product::all(); // Mengambil semua produk untuk form
        return view('orders.index', compact('orders', 'products'));
    }

    // Menyimpan pesanan baru
    public function store(Request $request)
    {
        // Validasi produk
        $request->validate([
            'product_id' => 'required|exists:products,id', // Validasi ID produk
            'quantity' => 'required|integer|min:1', // Validasi kuantitas
        ]);

        // Ambil produk berdasarkan ID
        $product = Product::find($request->product_id);

        // Cek apakah cukup stok
        if ($product->stock < $request->quantity) {
            return redirect()->route('orders.index')->with('error', 'Stok tidak cukup untuk produk ini.');
        }

        // Hitung total harga
        $totalPrice = $product->price * $request->quantity;

        // Membuat pesanan baru dengan total harga
        $order = Order::create(['total_price' => $totalPrice]);

        // Menyimpan produk ke dalam pesanan dengan kuantitasnya
        $order->products()->attach($request->product_id, [
            'quantity' => $request->quantity,
            'price' => $product->price, // Simpan harga dari produk
        ]);

        // Kurangi stok produk
        $product->stock -= $request->quantity;
        $product->save(); // Simpan perubahan stok ke database

        return redirect()->route('orders.index')->with('success', 'Pesanan berhasil dibuat.');
    }

    // Menampilkan detail pesanan tertentu
    public function show($id)
    {
        $order = Order::with('products')->findOrFail($id);
        return view('orders.show', compact('order'));
    }

    // Menghapus pesanan tertentu
    public function destroy($id)
    {
        $order = Order::with('products')->findOrFail($id); // Ambil produk terkait

        // Kembalikan stok produk yang terhubung
        foreach ($order->products as $product) {
            $productModel = Product::find($product->id);
            $productModel->stock += $product->pivot->quantity; // Kembalikan kuantitas
            $productModel->save(); // Simpan perubahan stok ke database
        }

        // Hapus relasi produk dan pesanan
        $order->products()->detach(); // Menghapus relasi produk
        $order->delete(); // Menghapus pesanan

        return redirect()->route('orders.index')->with('success', 'Pesanan berhasil dihapus.');
    }
}
