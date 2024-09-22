<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderProductTable extends Migration
{
    public function up()
    {
        Schema::create('order_product', function (Blueprint $table) {
            $table->foreignId('order_id')->constrained()->onDelete('cascade'); // Menyimpan referensi ke order
            $table->foreignId('product_id')->constrained()->onDelete('cascade'); // Menyimpan referensi ke produk
            $table->integer('quantity')->default(1); // Kuantitas, default ke 1
            $table->decimal('price', 10, 2); // Harga produk saat pemesanan
            $table->timestamps(); // Menambahkan created_at dan updated_at
            
            // Menambahkan primary key pada kombinasi order_id dan product_id
            $table->primary(['order_id', 'product_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('order_product');
    }
}
