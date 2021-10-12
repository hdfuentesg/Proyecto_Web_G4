<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ReservaController;
use App\Http\Controllers\HabitacionController;


Route::post('/Cliente/signup',[ClienteController::class, 'signup']);
Route::post('/Cliente/login',[ClienteController::class, 'login']);
Route::get('/Habitacion/search',[HabitacionController::class, 'search']);
/* Route::post('/habitacion/filter',[HabitacionController::class, 'filter']); */

Route::group(['middleware' => ['jwt.verify']], function() {
    Router::get('/Cliente',[ClienteController::class, 'showAll']);
    Router::post('/Cliente/update',[ClienteController::class, 'update']);
    Router::post('/Reservacion/create',[ReservaController::class, 'create']);
    Router::post('/Reservacion/history',[ReservaController::class, 'showByCliente']);
});

/* Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
}); */
