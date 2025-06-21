<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Actor;

class ActorController extends Controller
{
    public function showActors()
    {
        return Actor::all();
    }

    public function addActor(Request $request)
    {
        Actor::create(
            ['name'  => $request->name]
        );

        return response()->json([
            'Description' => 'Actor registered'
        ]);
    }

    public function updateActor(Request $request)
    {
        Actor::updated($request->name);
        return response()->json([
            'Description' => 'Actor updated'
        ]);
    }

    public function deleteActor(string $id)
    {
        Actor::destroy($id);
        
    }
}
