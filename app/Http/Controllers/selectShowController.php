<?php

namespace App\Http\Controllers;

use App\Models\Cinema;
use App\Models\Movie;
use App\Models\Province;
use Illuminate\Support\Facades\DB;


class selectShowController extends Controller
{
    public function getbooking($id, $date)
    {
        $province = Province::all();
        $movies = Movie::where('id', $id)->get();
        $recomendmovies = Movie::where('status', 1)->inRandomOrder()->take(5)->get();
        $selectedDate = $date;
       
        $cinema = Cinema::with(['theaters.shows' => function ($query) use ($id, $selectedDate) {
            $query->where('movie_id', $id)->whereDate('date_show', $selectedDate);
        }])->whereHas('theaters.shows', function ($query) use ($id) {
            $query->where('movie_id', $id);
        })->get();

        $data = DB::table('movies_genres')
            ->join('movies', 'movies_genres.movie_id', '=', 'movies.id')
            ->join('genres', 'movies_genres.genre_id', '=', 'genres.id')
            ->select('movies.id', 'genres.genre_name')
            ->get()
            ->groupBy('id');

        return view('home.selectShow', compact('movies', 'data', 'recomendmovies', 'province', 'cinema'));
    }

    // public function getCinema($provinceID = null)
    // {
    //     if ($provinceID) {
    //         $cinemas = Cinema::where('province', $provinceID)->get();
    //     } else {
    //         $cinemas = Cinema::all();
    //     }
    //     return response()->json($cinemas);
    // }
}
