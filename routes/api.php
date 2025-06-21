<?php

use App\Http\Controllers\ActorController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\MovieController;
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


Route::group([

    'middleware' => ['auth',] 
    

], function ($router) {

    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/refresh', [AuthController::class, 'refresh']);
    Route::post('/me', [AuthController::class, 'me']);

});

Route::group([
    'middleware' => ['auth', 'employee']
], function ($router) {
    Route::get('/actors', [ActorController::class, 'showActors']);
    Route::post('/create_actor', [ActorController::class, 'addActor']);
    Route::put('/update_actor', [ActorController::class, 'updateActor']);
    Route::post('/delete_actor', [ActorController::class, 'deleteActors']);

});



Route::post('/login', [AuthController::class, 'login']);


Route::post('/create_movie', [MovieController::class, 'createMovie']);
Route::post('/update_movie/{id}', [MovieController::class, 'updateMovie']);
Route::get('/movies', [MovieController::class, 'listMovies']);

Route::post('/create_genre', [GenreController::class, 'createGenre']);

//Route::resource('/user', UserController::class);
//Usuario
Route::get('/user', [UserController::class, 'indexCustomers'])->middleware('auth:api');
Route::post('/register', [UserController::class, 'store']);



//Roles
Route::get('/role', [\App\Http\Controllers\RoleController::class, 'index']);
Route::post('/role', [\App\Http\Controllers\RoleController::class, 'store']);

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