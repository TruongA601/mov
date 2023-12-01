<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Actor;
use Illuminate\Http\Request;

class actorController extends Controller
{
    public function actors()
    {
        $actor = Actor::all();
        return view('admin.actors.actor', compact('actor'));
    }
    public function update(Request $request, $id)
    {
        $data = $request->input('name');
        $actor = Actor::find( $id);
        $actor->update(['name' => $data]);
        return back()->with('success', 'Successfully updated');
    }
    public function create(Request $request)
    {
        $actor = new Actor();
        $actor->name = $request->name;
        $actor->save();
        return redirect()->route('actors')->with('success', ' Successfully created');
    }
    public function delete($id)
    {
        Actor::find($id)->delete();
    }
}
