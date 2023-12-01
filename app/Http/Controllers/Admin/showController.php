<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cinema;
use App\Models\Movie;
use App\Models\Seat;
use App\Models\Show;
use App\Models\ShowSeat;
use App\Models\Theater;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class showController extends Controller
{
    public function showtimes($id)
    {
        $movies = Movie::where('id', $id)->get();
        $cinemas = Cinema::all();
        $theaters = Theater::all();
        $shows = Show::where('movie_id', $id)->get();
        $data = DB::table('shows')->join('theaters', 'shows.theater_id', '=', 'theaters.id')
            ->join('cinemas', 'cinemas.id', '=', 'theaters.cinema_id')
            ->select('shows.id', 'theaters.name as theater_name', 'cinemas.name as cinema_name')
            ->orderBy('shows.id')
            ->get()->groupBy('id');
        return view('admin.shows.showtimes', compact('movies', 'cinemas', 'theaters', 'shows', 'data'));
    }
    public function store(Request $request)
    {
        $showtime = Show::create($request->all());
        $seats = Seat::where('theater_id', $request->theater_id)->get();

        foreach ($seats as $seat) {
            ShowSeat::create([
                'show_id' => $showtime->id,
                'seat_id' => $seat->id,
                'status' => 'available',
            ]);
        }
        return back()->with('success', 'Show created successfully.');
    }

    public function update(Request $request, $id)
    {
        Show::find($id)->update($request->all());
        return back()->with('success', 'Show updated successfully.');
    }

    public function delete($id)
    {
        DB::table('shows')->where('id',$id)->delete();
    }

    public function getTheater($cinemaID)
    {
        $theaters = Theater::where('cinema_id', $cinemaID)->get();
        return response()->json($theaters);
    }
}
