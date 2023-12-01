<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Actor extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'name', 'link',
    ];
    protected $primaryKey = 'id';
    protected $table = 'actors';

    public function movie()
    {
        return  $this->belongsToMany(Movie::class, 'movie_actor', 'actor_id', 'movie_id');
    }
}
