<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Rating;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ratings = Movie::withCount('ratings')->withAvg('ratings','score')->get();
        $ratings->makeHidden(['created_at','updated_at']);


        $data = $ratings->map(function ($rating) {
            return[
                'id'=>$rating->id,
                'title'=>$rating->title,
                'length'=>$rating->length,
                'genre'=>$rating->genre,
                'averagescore'=>$rating->ratings_avg_score,
                'countrating'=>$rating->ratings_count
            ];
        });
        return response()->json($data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'=>'required|string',
            'movie_id'=>'required|integer|exists:movies,id',
            'score'=>'required|integer|min:1|max:5',
        ]);
        Rating::create($validated);
        return response()->json(["message"=>"Sikeres hozzáadás"]);
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
