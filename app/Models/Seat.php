<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seat extends Model
{
    public $timestamps = false;
    protected $fillable = ['theater_id','seatRow','seatColumn'];
    protected $primaryKey = 'id';
    protected $table = 'seats';
    public function theater()
    {
        return $this->belongsTo(Theater::class);
    }
    
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
