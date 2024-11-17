<?php

namespace App\Http\Controllers;

use App\Mail\Recibo;
use Illuminate\Support\Facades\Mail;
use App\Models\InfoUsuario;
use App\Models\Pelicula;
use App\Models\Reservacion;
use Illuminate\Http\Request;

class ReservacionController extends Controller
{
    public function reservar(Request $request)
    {
        $reservacion = new Reservacion();
        $reservacion->asiento = $request->asiento;
        $reservacion->info_usuarios_id = $request->info_usuarios_id;
        $reservacion->pelicula_id = $request->pelicula_id;
        $reservacion->sala_id = $request->sala_id;
        $reservacion->total = $request->total;

        $info = InfoUsuario::find($request->info_usuarios_id);
        $pelicula = Pelicula::find($request->pelicula_id);
        
        $reservacion->save();


        Mail::to('eduardopaez48@gmail.com')->send(new Recibo($reservacion, $info, $pelicula, $request->hora, $request->tipo_sala, $request->sucursal, $request->fecha));



    }


}
