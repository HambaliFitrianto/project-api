<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSoldToOrderProductTable extends Migration
{
    public function up()
    {
        Schema::table('order_product', function (Blueprint $table) {
            // Menambahkan kolom sold jika belum ada
            if (!Schema::hasColumn('order_product', 'sold')) {
                $table->integer('sold')->nullable(); // Menambahkan kolom sold
            }
        });
    }

    public function down()
    {
        Schema::table('order_product', function (Blueprint $table) {
            // Menghapus kolom sold jika rollback
            if (Schema::hasColumn('order_product', 'sold')) {
                $table->dropColumn('sold'); 
            }
        });
    }
}
