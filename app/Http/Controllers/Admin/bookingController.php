<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;


class bookingController extends Controller
{
    public function booking()
    {
        $booking = DB::table('bookings')
            ->join('booking_detail', 'bookings.id', '=', 'booking_detail.booking_id')
            ->join('movies', 'booking_detail.movie_id', '=', 'movies.id')
            ->join('users', 'bookings.user_id', '=', 'users.id')
            ->selectRaw('
                DISTINCT(bookings.id) as booking_id,
                users.username as user_name,
                movies.name as movie_name,
                bookings.show_id as show_id,
                bookings.booking_time as booking_time,
                bookings.total_price as total_price,
                booking_detail.show_time as show_time
            ')
            ->orderByDesc('booking_time')
            ->get();
    
        return view('admin.booking.booking', compact('booking'));
    }
    
    public function detail($id)
    {
        $data = DB::table('bookings')->join('booking_detail', 'bookings.id', '=', 'booking_detail.booking_id')
            ->join('movies', 'movies.id', '=', 'booking_detail.movie_id')
            ->join('cinemas', 'cinemas.id', '=', 'booking_detail.cinema_id')
            ->join('shows', 'shows.id', '=', 'bookings.show_id')
            ->join('theaters', 'theaters.id', '=', 'booking_detail.theater_id')
            ->select(
                'movies.name as movie_name',
                'theaters.name as theater_name',
                'cinemas.name as cinema_name',
                'bookings.booking_time as booking_time',
                'bookings.total_price as total_price',
                'shows.date_show as date_show',
                'shows.start_time as start_time'
            )
            ->where('bookings.id', $id)->first();
        $seat = DB::table('booking_detail')->join('bookings', 'bookings.id', '=', 'booking_detail.booking_id')
            ->join('show_seat', 'show_seat.id', '=', 'booking_detail.seat_id')
            ->join('seats', 'seats.id', '=', 'show_seat.seat_id')
            ->select('booking_detail.seat_id as seat_id', 'seats.seatRow as seat_row', 'seats.seatColumn as seat_column')
            ->where('bookings.id', $id)
            ->get();
        return view('admin.booking.detail', compact('data', 'seat'));
    }
}
