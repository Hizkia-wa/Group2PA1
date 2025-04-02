<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $table = 'carts';
    protected $primaryKey = 'CartsID';
    protected $fillable = ['ProductID', 'NamaProduct', 'Quantity'];

    public $timestamps = true;

    // Relasi dengan Product
    public function product()
    {
        return $this->belongsTo(Product::class, 'ProductID', 'ProductID');
    }
}
