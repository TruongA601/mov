<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Genre;
use App\Models\Movie;
use Illuminate\Http\Request;

class homeController extends Controller
{
    public function index()
    {
        $currentDate = now();
        $banner = Banner::all();
        $movies = Movie::where('status', 1)
            ->where(function ($query) use ($currentDate) {
                $query->whereNull('daterelease')
                    ->orWhere('daterelease', '<=', $currentDate);
            })
            ->take(10)
            ->get();

        $coming =   Movie::where('status', 1)
            ->where('daterelease', '>', $currentDate)
            ->take(10)
            ->get();
        $recomendmovies = Movie::where('status', 1)
            ->inRandomOrder()
            ->where(function ($query) use ($currentDate) {
                $query->whereNull('daterelease')
                    ->orWhere('daterelease', '<=', $currentDate);
            })
            ->take(5)
            ->get();
        return view('home.home', compact('movies', 'coming', 'recomendmovies', 'banner'));
    }
    public function support()
    {
        return view('home.support');
    }
    public function aboutus()
    {
        return view('home.aboutus');
    }
    public function allmovie()
    {
        $currentDate = now();
        $genres = Genre::all();
        $banner = Banner::all();
        $movies = Movie::where('status', 1)
            ->where(function ($query) use ($currentDate) {
                $query->whereNull('daterelease')
                    ->orWhere('daterelease', '<=', $currentDate);
            })
            ->get();
        return view('home.allmovie', compact('movies', 'banner', 'genres'));
    }
    public function comingmovie(){
        
            $currentDate = now();
            $genres = Genre::all();
            $banner = Banner::all();
            $movies = Movie::where('status', 1)
            ->where('daterelease', '>', $currentDate)
            ->get();
            return view('home.comingmovie', compact('movies', 'banner', 'genres'));
      
    }

    public function filterByGenre(Request $request)
    {
        $genreIds = $request->input('genre', '');
        $genres = Genre::all();
        $banner = Banner::all();

        if (!empty($genreIds)) {
            $genreIds = is_array($genreIds) ? $genreIds : explode(',', $genreIds);
            $movies = Movie::where('status', 1)
                ->whereHas('genre', function ($query) use ($genreIds) {
                    $query->whereIn('genres.id', $genreIds);
                })->get();
        } else {
            $movies = Movie::where('status', 1)->get();
        }
        return view('home.allmovie', compact('movies', 'banner', 'genres'));
    }
}
