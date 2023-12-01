<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Show extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['movie_id', 'theater_id', 'date_show', 'start_time', 'price'];
    protected $primaryKey = 'id';
    protected $table = 'shows';
    public function movie()
    {
        return $this->belongsTo(Movie::class, 'movie_id');
    }

    public function theater()
    {
        return $this->belongsTo(Theater::class);
    }

    public function seats()
    {
        return $this->hasMany(Seat::class);
    }
}
