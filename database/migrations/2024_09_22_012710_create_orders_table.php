<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id(); // ID pesanan
            $table->timestamps(); // created_at dan updated_at otomatis
        });

        Schema::create('order_product', function (Blueprint $table) {
            $table->id(); // ID untuk relasi produk dan pesanan
            $table->foreignId('order_id')->constrained()->onDelete('cascade'); // Foreign key untuk orders
            $table->foreignId('product_id')->constrained()->onDelete('cascade'); // Foreign key untuk products
            $table->integer('quantity'); // Jumlah produk dipesan
            $table->integer('price'); // Harga produk saat dipesan
            $table->integer('stock'); // Stok produk saat dipesan
            $table->integer('sold'); // Jumlah yang terjual
            $table->timestamps(); // created_at dan updated_at otomatis
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_product'); // Hapus tabel pivot terlebih dahulu
        Schema::dropIfExists('orders'); // Hapus tabel orders
    }
};
