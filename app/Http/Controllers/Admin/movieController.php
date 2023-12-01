<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Actor;
use App\Models\Genre;
use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class movieController extends Controller
{
    public function movies()
    {
        $movies = Movie::all();
        $genre = Genre::all();
        $data = DB::table('movies_genres')
            ->join('movies', 'movies_genres.movie_id', '=', 'movies.id')
            ->join('genres', 'movies_genres.genre_id', '=', 'genres.id')
            ->select('movies.id', 'genres.genre_name')
            ->get()
            ->groupBy('id');
        return view('admin.movies.movie', compact('movies', 'genre', 'data'));
    }
    public function updateStatus(Request $request)
    {
        $movieId = $request->input('movieId');
        $status = $request->input('status');

        $movie = Movie::find($movieId);

        if (!$movie) {
            return response()->json(['error' => 'Movie not found'], 404);
        }
        $movie->status = $status;
        $movie->save();

        return response()->json(['message' => 'Status updated successfully']);
    }

    public function viewupdate($id)
    {
        $movies = Movie::where('id', $id)->get();
        $genre = Genre::all();
        $actor = Actor::all();
        $moviesgenre = DB::table('movies_genres')->select('genre_id')->where('movie_id', $id);
        $movieactor = DB::table('movie_actor')->select('actor_id')->where('movie_id', $id);
        return view('admin.movies.update', compact('movies', 'genre', 'moviesgenre', 'actor', 'movieactor'));
    }
    public function viewadd()
    {
        $genre = Genre::all();
        $actor = Actor::all();
        return view('admin.movies.add', compact('genre', 'actor'));
    }
    public function add(Request $request)
    {
        $request->validate([
            'poster' => 'image|mimes:jpeg,png,jpg,gif,svg|max:10048',
            'background' => 'image|mimes:jpeg,png,jpg,gif,svg|max:10048',
        ]);
        if ($request->hasFile('poster')) {
            $imageName = $request->file('poster')->getClientOriginalName();
            $request->file('poster')->move(public_path('uploads/movies'), $imageName);
        } else {
            $imageName = null;
        }
        if ($request->hasFile('background')) {
            $backgroundImageName = $request->file('background')->getClientOriginalName();
            $request->file('background')->move(public_path('uploads/movies'), $backgroundImageName);
        } else {
            $backgroundImageName = null;
        }
        $movies = new Movie();
        $movies->name = $request->name;
        $movies->poster = $imageName;
        $movies->duration = $request->duration;
        $movies->trailer = $request->trailer;
        $movies->director = $request->director;
        $movies->description = $request->description;
        $movies->daterelease = $request->daterelease;
        $movies->background = $backgroundImageName;
        $movies->save();
        $theLoaiIds = $request->input('genre_id');
        $movies->genre()->sync($theLoaiIds);
        $actorIds = $request->input('actor_id');
        $movies->actor()->sync($actorIds);
        return redirect()->route('movies')->with('success', 'Movie created successfully');
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'poster' => 'image|mimes:jpeg,png,jpg,gif,svg|max:10048',
            'background' => 'image|mimes:jpeg,png,jpg,gif,svg|max:10048',
        ]);

        $movies = Movie::find($id);

        if ($request->hasFile('poster')) {
            $destination = public_path('uploads/movies/' . $movies->poster);
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $posterName = $request->file('poster')->getClientOriginalName();
            $request->file('poster')->move(public_path('uploads/movies'), $posterName);
            $movies->poster = $posterName;
        }

        if ($request->hasFile('background')) {
            $destination = public_path('uploads/movies/' . $movies->background);
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $backgroundName = $request->file('background')->getClientOriginalName();
            $request->file('background')->move(public_path('uploads/movies'), $backgroundName);
            $movies->background = $backgroundName;
        }

        $data = $request->all();
        $movies->update([
            'name' => $data['name'],
            'duration' => $data['duration'],
            'trailer' => $data['trailer'],
            'director' => $data['director'],
            'description' => $data['description'],
            'daterelease' => $data['daterelease'],

        ]);
        $genres = $data['genres'];
        $movies->genre()->sync($genres);
        $actors = $data['actors'];
        $movies->actor()->sync($actors);
        return back()->with('success', 'Successfully updated');
    }
    public function delete($id)
    {
        DB::table('movies_genres')->where('movie_id', $id)->delete();
        DB::table('movie_actor')->where('movie_id', $id)->delete();
        $movie = Movie::where('id', $id)->first();
        $imageDirectory = 'uploads/movies/';
        File::delete($imageDirectory . $movie->poster);
        $movie->delete();
    }
}
