<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sala;
class SalaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Sala::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $sala = new Sala();
        $sala->nombre_sala = $request->nombre_sala;
        $sala->numero_asientos = $request->numero_asientos;
        $sala->desde = $request->desde;
        $sala->hasta = $request->hasta;
        $sala->tipo_sala = $request->tipo_sala;
        $sala->usuario_id = $request->usuario_id;
        $sala->save();

        return response()->json([
            'status' => 200,
            'description' => 'Sala registrada'

        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Sala::find($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $sala = Sala::find($id);
        $sala->nombre_sala = $request->nombre_sala;
        $sala->numero_asientos = $request->numero_asientos;
        $sala->desde = $request->desde;
        $sala->hasta = $request->hasta;
        $sala->tipo_sala = $request->tipo_sala;
        $sala->usuario_id = $request->usuario_id;
        $sala->save();

        return response()->json([
            'status' => 200,
            'description' => 'Sala actualizada'

        ]);
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Sala::destroy($id);
    }
}
