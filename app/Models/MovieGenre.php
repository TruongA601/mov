<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MovieGenre extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'movie_id', 'genre_id',
    ];
    protected $primaryKey = 'id';
    protected $table = 'movies_genres';

    
}
