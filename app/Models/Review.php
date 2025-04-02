<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $table = 'reviews';
    protected $primaryKey = 'ReviewID';
    protected $fillable = ['ReviewerName', 'Rating', 'Picture', 'Coment'];

    public $timestamps = true;
}
