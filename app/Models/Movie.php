<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
  public $timestamps = false;
  protected $fillable = [
    'poster',
    'name',
    'daterelease',
    'duration',
    'trailer',
    'director',
    'description',
    'background',
    'status',
  ];
  protected $primaryKey = 'id';
  protected $table = 'movies';


  public function genre()
  {
    return  $this->belongsToMany(Genre::class, 'movies_genres', 'movie_id', 'genre_id');
  }
  public function actor()
  {
    return  $this->belongsToMany(Actor::class, 'movie_actor', 'movie_id', 'actor_id');
  }
  public function show()
{
    return $this->hasMany(Show::class);
}

}
