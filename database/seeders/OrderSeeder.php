<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Order; // Pastikan Anda mengimpor model Order
use App\Models\Product; // Pastikan Anda mengimpor model Product

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Membuat pesanan pertama
        $order = Order::create([
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Mengaitkan produk dengan pesanan
        $order->products()->attach([
            2 => [
                'quantity' => 1,
                'price' => 7000000,
                'stock' => 49,
                'sold' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            3 => [
                'quantity' => 5,
                'price' => 350000,
                'stock' => 45,
                'sold' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
