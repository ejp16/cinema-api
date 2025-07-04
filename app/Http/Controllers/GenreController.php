<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class GenreController extends Controller
{

    public function listGenres()
    {
        return Genre::all()->toJson();
    }

    public function createGenre(Request $request)
    {
        Genre::create($request->all());

        return response()->json([], 201);
    }

    public function updateGenre(Request $request, string $id)
    {
        $genre = Genre::find($id);
        $genre->update( $request->all() );

    }

    public function removeGenre(string $id)
    {
        Genre::destroy($id);
    }
}
