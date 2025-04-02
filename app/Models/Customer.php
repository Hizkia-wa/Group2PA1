<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $table = 'customers';
    protected $primaryKey = 'CustomerID';
    protected $fillable = ['CustomerName', 'Email', 'Password', 'Address', 'Birthday'];

    public $timestamps = true;
}
