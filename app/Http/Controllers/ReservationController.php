<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Seat;
use App\Models\Projection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReservationController extends Controller
{

    public function reservations()
    {
        return Reservation::all()->load('seats');
    }


    public function addReservation(Request $request)
    {
        return DB::transaction(function () use ($request) {
            $data = $request->except('seats');
            $data['user_id'] = auth()->id();            

            $seatIds = $request->input('seats', []);

            $theater_id = Projection::find($request->projection_id)->theater_id;

            $validSeats = Seat::whereIn('id', $seatIds)->where('theater_id', $theater_id)->count();

            if($validSeats !== count($seatIds)){
                return response()->json([
                    'error' => 'One or more seats do not belong to the selected theater'
                ], 422);
            }

            $check_seats = Seat::whereIn('id', $seatIds)
                ->whereHas('reservation')->pluck('id')->toArray();

            if(!empty($check_seats)){
                return response()->json([
                    'error' => 'Seats already has been taken',
                    'occupied_seats_id' => $check_seats
                ], 409);

            }

            $reservation = Reservation::create($data);

            $reservation->seats()->attach($seatIds);

            return response()->json($reservation->load('seats'), 201);
        });

    }
}
