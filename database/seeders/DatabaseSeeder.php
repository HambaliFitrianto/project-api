<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Database\Seeders\ProductSeeder; // Import ProductSeeder
use Database\Seeders\OrderSeeder; // Import OrderSeeder

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Menjalankan ProductSeeder
        $this->call(ProductSeeder::class);

        // Menjalankan OrderSeeder
        $this->call(OrderSeeder::class);

        // Menambahkan data pengguna
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
    }
}
