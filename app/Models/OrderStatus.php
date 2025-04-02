<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderStatus extends Model
{
    use HasFactory;

    protected $table = 'order_statuses';
    protected $primaryKey = 'OrderStatusID';
    protected $fillable = ['ProductID', 'CustomerID', 'CustomerName', 'ProductName', 'Quantity', 'Request', 'Address', 'OrderStatus'];

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
