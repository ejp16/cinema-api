<?php

namespace App\Http\Controllers;

use App\Models\Seat;
use Illuminate\Http\Request;

class SeatController extends Controller
{

    public function seats()
    {
        return Seat::all();
    }

    public function addSeat(Request $request)
    {

        Seat::create( $request->all() );

        return response()->json([
            'Description' => 'Seat created'
        ]);
    }


    public function updateSeat(Request $request, string $id)
    {
        $seat = Seat::find($id);

        $seat->update( $request->all() );

        return $seat;
    }

    public function removeSeat(string $id)
    {
        Seat::destroy($id);
    }

    /**
     * Update the specified resource in storage.
     */

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
