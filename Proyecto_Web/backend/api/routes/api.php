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
    Route::get('/Cliente', [ClienteController::class, 'showAll']);
    Route::post('/Cliente/update', [ClienteController::class, 'update']);
    Route::post('/Reserva/create', [ReservaController::class, 'create']);
    Route::post('/Reserva/history', [ReservaController::class, 'showByCliente']);
});

/* Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
}); */
