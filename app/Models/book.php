<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Book extends Model
{
    use HasFactory;

    protected $table = 'books';
    protected $primaryKey = 'book_id';

    protected $fillable = [
        'user_id',
        'title',
        'author',
        'status',
        'review',
        'rating',
        'date_added',
        'date_finished',
    ];
}
