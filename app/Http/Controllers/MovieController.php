<?php

namespace App\Http\Controllers;
use App\Models\Movie;
use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\CreateMovieRequest;

class MovieController extends Controller
{

    public function listMovies()
    {
        return Movie::all();
    }


    public function createMovie(CreateMovieRequest $request): JsonResponse
    {
        $validated = $request->validated();

        $genre = Genre::where('genre_name', $validated['genre_name'])->get();

        
        $movie = Movie::create([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'duration' => $validated['duration'],
            'genre_id' => $genre[0]->id,
            'rating' => $validated['rating'],
            'image' => 'aaa',
            'added_by' => auth()->user()->name
        ]);
        
        return response()->json([
            'description' => 'Movie created successfully',
            'data' => $movie
        ]);
    }

    public function updateMovie(CreateMovieRequest $request, string $id): JsonResponse
    {
        $movie = Movie::find($id);
        $validated = $request->validated();

        if( ! $movie ){
            return response()->json(['error' => 'No movie found'], 400);
        }

        if(isset($validated['genre_name'])){
            $genre = Genre::where('genre_name', $validated['genre_name'])->first();

            if($genre){
                $validated['genre_id'] = $genre->id;
            }
            unset($validated['genre_name']);
        }

        $movie->update($validated);
        
        return response()->json([
            'description' => 'Movie updated successfully',
            'data' => $movie
        ]);

    }

    public function removeMovie(Request $request, string $id): JsonResponse
    {
        Movie::destroy($id);
        return response()->json(['Description' => 'Movie deleted successfully']);
    }
}
