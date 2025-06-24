<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Theater;
use Illuminate\Http\Request;

class TheaterRoomController extends Controller
{
    public function theaters()
    {
        return Theater::all();
    }

    public function addTheater(Request $request)
    {
        Theater::create([
            'room_name' => $request->room_name
        ]);

        return response()->json([
            'Description' => 'Thearer added successfully'
        ]);
    }

    public function updateTheater(Request $request, string $id)
    {
        $theater = Theater::find($id);

        $theater->update( $request->all() );
    }

    public function removeTheater(string $id)
    {
        Theater::destroy($id);
    }


}
