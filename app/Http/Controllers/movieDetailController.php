<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\District;
use App\Models\Movie;
use App\Models\Province;
use App\Models\Ward;
use Illuminate\Support\Facades\DB;

class movieDetailController extends Controller
{
    public function moviedetail($id)
    {
        $province = Province::all();
        $ward = Ward::all();
        $district = District::all();
        $movies = Movie::where('id', $id)->get();
        $recomendmovies = Movie::where('status', 1)->inRandomOrder()->take(5)->get();
        $genre = DB::table('movies')
            ->join('movies_genres', 'movies_genres.movie_id', '=', 'movies.id')
            ->join('genres', 'movies_genres.genre_id', '=', 'genres.id')
            ->select('movies.id', 'genres.genre_name')     
            ->get()
            ->groupBy('id');
        $actor = DB::table('movies')
            ->join('movie_actor', 'movie_actor.movie_id', '=', 'movies.id')
            ->join('actors', 'movie_actor.actor_id', '=', 'actors.id')
            ->select('movies.id', 'actors.name as actor_name')         
            ->get()
            ->groupBy('id');
        return view('home.moviedetail', compact('movies', 'genre', 'actor', 'recomendmovies', 'province', 'district', 'ward'));
    }
}
