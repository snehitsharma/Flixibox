<?php

namespace App\Http\Controllers;
use App\Models\Movie;
use Inertia\Inertia;

class MovieController extends Controller
{
    public function show(Movie $movie)
    {
        
        return Inertia::render('Movies/Show', [
            'movie' => [
                ...$movie->toArray(),
                'genres' => json_decode($movie->genres, true), // Convert JSON string to array if needed
            ]
        ]);
    }
}