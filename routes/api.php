<?php

use App\Http\Controllers\PeliculaController;
use App\Http\Controllers\SalaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ReservacionController;
use App\Models\Pelicula;
use App\Models\Reservacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
/* 
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
}); */

//Route::resource('/user', UserController::class);
//Usuario
Route::post('/user', [UserController::class, 'login']);
Route::get('/user/{id}', [UserController::class, 'getUser']);
Route::post('/user/cambiarPassword', [UserController::class, 'cambiarPassword']);
Route::get('/user/info/{id}', [UserController::class, 'getUserInfo']);
Route::post('/user/store', [UserController::class, 'storeUser']);
Route::post('user/storeInfo', [UserController::class, 'storeInfo']);
Route::put('/user/update/{id}', [UserController::class, 'update']);
Route::delete('user/delete/{id}', [UserController::class, 'delete']);

//Salas de cine
Route::post('/salas', [SalaController::class, 'store']);
Route::get('/salas', [SalaController::class, 'index']);
Route::get('/sala/delete/{id}', [SalaController::class, 'destroy']);
Route::get('sala/{id}', [SalaController::class, 'show']);
Route::post('/sala/update/{id}', [SalaController::class, 'update']);

//Peliculas
Route::post('/pelicula', [PeliculaController::class, 'store']);
Route::get('/peliculas', [PeliculaController::class, 'index']);
Route::get('/pelicula/{id}', [PeliculaController::class, 'show']);
Route::post('/pelicula/delete/{id}', [PeliculaController::class, 'delete']);
Route::put('/pelicula/{id}', [PeliculaController::class, 'update']);

//Reservacion
Route::post('/reservacion', [ReservacionController::class, 'reservar']);