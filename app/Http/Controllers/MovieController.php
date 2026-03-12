<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $movies = Movie::all();
        return response()->json($movies, 200, options: JSON_UNESCAPED_UNICODE);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate(
            [
                'title' => 'required|string',
                'length' => 'required|integer',
                'genre' => 'required|string'
            ],
            [
                'required' => ':attribute megadása kötelező!',
                'string' => ':attribute szöveges adat!',
                'integer' => ':attribute szsám adat!'
            ],
            [
                'title' => 'cím',
                'length' => 'hossz',
                'genre' => 'műfaj'
            ]
        );
        Movie::create($validated);
        return response()->json(["message" => "Sikeresen létrehozva a film!"]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
