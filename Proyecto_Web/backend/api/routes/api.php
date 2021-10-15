<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ReservaController;
use App\Http\Controllers\HabitacionController;

Route::group(['middleware' => ['cors']], function(){
    Route::post('/cliente/signup', [ClienteController::class, 'signup']);
    Route::post('/cliente/login', [ClienteController::class, 'login']);
    Route::get('/habitacion/search', [HabitacionController::class, 'search']);
    Route::post('/habitacion/filter', [HabitacionController::class, 'filter']);

    Route::group(['middleware' => ['jwt.verify']], function(){
        Route::get('/Clientes', [ClienteController::class, 'showAll']);
        Route::post('/Cliente/update', [ClienteController::class, 'update']);
        Route::post('/reservacion/create', [ReservaController::class, 'create']);
        Route::get('/reservacion/history', [ReservaController::class, 'showByCliente']);
    });
});
/* Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
}); */
