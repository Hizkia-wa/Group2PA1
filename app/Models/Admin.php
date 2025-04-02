<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;

    protected $table = 'admins'; // Nama tabel yang digunakan (opsional jika tabel sudah mengikuti konvensi)
    protected $primaryKey = 'AdminID'; // Menentukan primary key
    protected $fillable = ['AdminName', 'Email', 'Password']; // Kolom yang dapat diisi secara massal

    public $timestamps = true; // Menandakan bahwa tabel ini memiliki kolom timestamps
}
