<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $table = 'tags'; // Nama tabel
    protected $primaryKey = 'tag_id'; // Primary key custom
    protected $fillable = ['tag_name']; // Kolom yang bisa diisi secara massal
}
