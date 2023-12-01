<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookingDetail extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['booking_id','seat_id','movie_id','cinema_id','theater_id','show_time','show_price'];
    protected $primaryKey = 'id';
    protected $table = 'booking_detail';
}
