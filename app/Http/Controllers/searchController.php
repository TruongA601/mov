<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class searchController extends Controller
{
    public function performSearch(Request $request)
    {
        try {
            $query = $request->input('query');
            $results = Movie::where('name', 'like', '%' . $query . '%') ->where('status', 1)->get();
            return response()->json($results);
        } catch (\Exception $e) {
            Log::error('Error performing search: ' . $e->getMessage());
            return response()->json(['error' => 'An error occurred during the search.']);
        }
    }
}
