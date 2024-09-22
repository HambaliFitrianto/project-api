<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // Menentukan atribut yang dapat diisi (fillable)
    protected $fillable = ['name', 'price', 'stock', 'sold'];

    // Definisikan relasi Many-to-Many dengan model Order
    public function orders()
    {
        return $this->belongsToMany(Order::class, 'order_product')
                    ->withPivot('quantity', 'price', 'stock', 'sold') // Menyimpan informasi tambahan di tabel pivot
                    ->withTimestamps(); // Otomatis mengisi created_at dan updated_at di tabel pivot
    }
}
