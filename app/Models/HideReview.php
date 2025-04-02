<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HideReview extends Model
{
    use HasFactory;

    protected $table = 'hide_reviews';
    protected $primaryKey = 'HideReviewID';
    protected $fillable = ['ReviewerName', 'Rating', 'Picture', 'Coment'];

    public $timestamps = true;
}
