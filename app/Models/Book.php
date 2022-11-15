<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'publisher',
        'writer',
        'year_published',
        'category',
        'description',
        'cover',
        'user_id'
    ];
}
