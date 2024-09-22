<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    // Menentukan atribut yang dapat diisi (fillable)
    protected $fillable = ['created_at', 'updated_at'];

    // Definisikan relasi Many-to-Many dengan model Product
    public function products()
    {
        return $this->belongsToMany(Product::class, 'order_product')
                    ->withPivot('quantity', 'price', 'stock', 'sold') // Menyimpan informasi tambahan di tabel pivot
                    ->withTimestamps(); // Otomatis mengisi created_at dan updated_at di tabel pivot
    }
}
