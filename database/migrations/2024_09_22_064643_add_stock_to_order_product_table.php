<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStockToOrderProductTable extends Migration
{
    public function up()
    {
        Schema::table('order_product', function (Blueprint $table) {
            // Menambahkan kolom stock jika belum ada
            if (!Schema::hasColumn('order_product', 'stock')) {
                $table->integer('stock')->nullable(); // Menambahkan kolom stock
            }
        });
    }

    public function down()
    {
        Schema::table('order_product', function (Blueprint $table) {
            // Menghapus kolom stock jika rollback
            if (Schema::hasColumn('order_product', 'stock')) {
                $table->dropColumn('stock'); 
            }
        });
    }
}
