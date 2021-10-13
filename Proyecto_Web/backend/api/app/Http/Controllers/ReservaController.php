<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reserva;
use JWTAuth;
use Illuminate\Database\QueryException;

class ReservaController extends Controller
{
    public function create (Request $request){
        return 'hola';
    }
}
