<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\Cinema;
use App\Models\Movie;
use App\Models\Seat;
use App\Models\Show;
use App\Models\ShowSeat;
use App\Models\Theater;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class selectSeatController extends Controller
{
    public function selectSeat($movieId, $cinemaId, $theaterId, $showId)
    {
        $movies = Movie::where('id', $movieId)->get();
        $theaters = Theater::where('id', $theaterId)->get();
        $cinemas = Cinema::where('id', $cinemaId)->get();
        $show = Show::where('movie_id', $movieId)->where('theater_id', $theaterId)->where('id', $showId)->get();
        $seat = Seat::where('theater_id', $theaterId)->get();
        $showseat = DB::table('show_seat')->join('seats', 'show_seat.seat_id', '=', 'seats.id')  
        ->where('show_seat.show_id', '=', $showId)
        ->select('show_seat.id as id', 'seats.seatRow as seatRow', 'seats.seatColumn as seatColumn','show_seat.status as status')
        ->get();
        return view("home.user.selectSeat", compact("show", 'movies',  'theaters', 'cinemas','showseat'));
    }
}
