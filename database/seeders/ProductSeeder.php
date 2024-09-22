<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::insert([
            [
                'id' => 1,
                'name' => 'Laptop X',
                'price' => 12000000,
                'stock' => 15,
                'sold' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'name' => 'Smartphone Y',
                'price' => 7000000,
                'stock' => 30,
                'sold' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 3,
                'name' => 'Headset Z',
                'price' => 350000,
                'stock' => 50,
                'sold' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
