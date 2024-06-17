<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $primaryKey = 'isbn';
    protected $keyType = 'string';

    protected $fillable = [
        'judul',
        'isbn',
        'penulis',
        'tahun_terbit',
    ];
    
    protected $table = 'ms_books';
}
