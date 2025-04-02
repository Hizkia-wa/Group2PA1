<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';
    protected $primaryKey = 'OrderID';
    protected $fillable = ['ProductID', 'CustomerID', 'CustomerName', 'ProductName', 'Quantity', 'Request', 'Address'];

    public $timestamps = true;

    // Relasi dengan Product dan Customer
    public function product()
    {
        return $this->belongsTo(Product::class, 'ProductID', 'ProductID');
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'CustomerID', 'CustomerID');
    }
}
