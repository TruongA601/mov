<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Genre;
use Illuminate\Http\Request;

class genreController extends Controller
{
    public function genres()
    {
        $genre = Genre::all();
        return view('admin.genres.genre', compact('genre'));
    }
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $genre = Genre::find($id);
        $genre->update([
            'genre_name' => $data['genre_name'],
            'genre_description' => $data['genre_description']
        ]);
        return back()->with('success', 'successfully updated');
    }
    public function add(Request $request)
    {
        $genre = new Genre();
        $genre->genre_name = $request->genre_name;
        $genre->genre_description = $request->genre_description;
        $genre->save();
        return redirect()->route('genres')->with('success', 'Successfully created');
    }
    public function delete($id)
    {   
        Genre::find ($id)->delete();
       
    }
}
