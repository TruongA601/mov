<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = ['user_id', 'show_id', 'booking_time', 'total_price'];
    protected $primaryKey = 'id';
    protected $table = 'bookings';


    public function show()
    {
        return $this->belongsTo(Show::class);
    }

    public function seat()
    {
        return $this->belongsTo(Seat::class);
    }
    public function bookingdetail()
    {
        return $this->hasMany(BookingDetail::class);
    }
}
