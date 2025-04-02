<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HideProduct extends Model
{
    use HasFactory;

    protected $table = 'hide_products';
    protected $primaryKey = 'HideProductID';
    protected $fillable = ['ProductName', 'Quantity', 'Price', 'Category', 'Description', 'Images'];

    public $timestamps = true;
}
