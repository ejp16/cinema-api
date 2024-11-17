<?php

namespace App\Http\Controllers;

use App\Models\Pelicula;
use Illuminate\Http\Request;

class PeliculaController extends Controller
{
    public function store(Request $request)
    {
        $peli = new Pelicula();
        $peli->titulo = $request->titulo;
        $peli->descripcion = $request->descripcion;
        $peli->genero = $request->genero;
        $peli->imagen = $request->imagen;
        $peli->estreno = $request->estreno;
        $peli->save();
        return response()->json([
            'description'=>'pelicula registrada'
        ]);
    }

    public function update(Request $request, string $id)
    {
        $peli = Pelicula::find($id);
        $peli->titulo = $request->titulo;
        $peli->descripcion = $request->descripcion;
        $peli->genero = $request->genero;
        $peli->imagen = $request->imagen;
        $peli->estreno = $request->estreno;
        $peli->save();
        return response()->json([
            'description'=>'pelicula actualizada'
        ]);
    }

    public function index()
    {
        return Pelicula::all();
    }

    public function show(string $id)
    {
        return Pelicula::find($id);
    }

    public function delete(Request $request)
    {
        Pelicula::destroy($request->id);
        return response()->json([
            'description' => 'pelicula borrada'
        ]);
    }
}
