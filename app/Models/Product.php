<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    protected $primaryKey = 'ProductID'; // ⬅️ kasih tahu Laravel bahwa primary key-nya ini

    public $incrementing = true;         // ⬅️ (opsional) tergantung kalau kamu pakai auto increment
    protected $keyType = 'int';          // ⬅️ sesuaikan dengan tipe kolom di DB

    protected $fillable = [
        'ProductName', 'Category', 'Price', 'Description', 'Images', 'Quantity'
    ];
}
