<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    // Menentukan atribut yang dapat diisi
    protected $fillable = ['created_at', 'updated_at']; // Tambahkan atribut lain jika perlu

    // Definisikan relasi dengan model Product
    public function products()
    {
        return $this->belongsToMany(Product::class, 'order_product')
                    ->withPivot('quantity', 'price', 'stock', 'sold')
                    ->withTimestamps();
    }
}

