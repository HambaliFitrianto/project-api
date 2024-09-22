<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Nama produk
            $table->integer('price'); // Harga produk
            $table->integer('stock'); // Stok produk
            $table->integer('sold')->default(0); // Terjual
            $table->timestamps(); // Created_at dan updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('products');
    }
}

