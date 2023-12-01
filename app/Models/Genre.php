<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'genre_name','genre_description',
    ];
    protected $primaryKey = 'id';
    protected $table = 'genres';

    public function movie()
    {
        return  $this->belongsToMany(Movie::class, 'movies_genres','genre_id', 'movie_id');
    }
   
}
