<?php

use App\Http\Controllers\ActorController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\PeliculaController;
use App\Http\Controllers\ProjectionController;
use App\Http\Controllers\SalaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ReservacionController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\SeatController;
use App\Http\Controllers\TheaterRoomController;
use App\Models\Pelicula;
use App\Models\Reservacion;
use App\Models\Theater;
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





Route::post('/login', [AuthController::class, 'login']);


Route::group([

    'middleware' => ['auth'] 
    

], function ($router) {

    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/refresh', [AuthController::class, 'refresh']);
    Route::post('/me', [AuthController::class, 'me']);

    
    Route::get('/seats', [SeatController::class, 'seats']);
    Route::get('/occuped_seats', [SeatController::class, 'ocuppedSeats']);

});

Route::group([
    'middleware' => ['auth', 'employee']
], function ($router) {
    Route::get('/actors', [ActorController::class, 'showActors']);
    Route::post('/actor', [ActorController::class, 'addActor']);
    Route::put('/actor/{id}', [ActorController::class, 'updateActor']);
    Route::delete('/actor/{id}', [ActorController::class, 'deleteActors']);
    
    Route::get('/movies', [MovieController::class, 'listMovies']);
    Route::post('/movie', [MovieController::class, 'createMovie']);
    Route::put('/movie/{id}', [MovieController::class, 'updateMovie']);
    Route::delete('/movie/{id}', [MovieController::class, 'removeMovie']);

    
    Route::post('/genre', [GenreController::class, 'createGenre']);

});

Route::group([
    'middleware' => ['auth', 'manager']
], function($router){
    Route::get('/projections', [ProjectionController::class, 'projections']);
    Route::post('/projection', [ProjectionController::class, 'addProjection']);
    Route::put('/projection/{id}', [ProjectionController::class, 'updateProjection']);
    Route::delete('/projection/{id}', [ProjectionController::class, 'removeProjection']);

    Route::get('/theaters', [TheaterRoomController::class, 'theaters']);
    Route::post('theater', [TheaterRoomController::class, 'addTheater']);
    Route::put('theater/{id}', [TheaterRoomController::class, 'updateTheater']);
    Route::delete('theater/{id}', [TheaterRoomController::class, 'removeTheater']);

    Route::post('/seat', [SeatController::class, 'addSeat']);
    Route::put('/seat/{id}', [SeatController::class, 'updateSeat']);
    Route::delete('/seat/{id}', [SeatController::class, 'removeSeat']);

    Route::get('/reservations', [ReservationController::class, 'reservations']);
    Route::post('/reservation', [ReservationController::class, 'addReservation']);

    
    Route::post('/register', [UserController::class, 'createEmployee']);
});


