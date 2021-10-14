<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Habitacion;


class HabitacionController extends Controller
{
    /* public function search($text){
        return $text;
        $text = $request->query('text');
        $habitaciones = Habitacion::with('hotel')->get();
        return $habitaciones; 
    } */

    public function search(Request $request){
        /* return $request->query('text'); */
        $text = $request->query('text');
        $habitaciones = Habitacion::with('hotel')->get();
        return $habitaciones;
    }

    public function filter(Request $request){
        $filter = $request->input('filter');

        switch($filter){
            case 'piso':
                $habitacion = Habitacion::whereBetween('piso', [$request->input('min'), $request->input('max')])->get();
                break;
            case 'precio':
                $habitacion = Habitacion::whereBetween('precio', [$request->input('min'), $request->input('max')])->get();
                break;
            case 'capacidad':
                $habitacion = Habitacion::where('capacidad', $request->input('value'))->get();
                break;
            case 'estrellas':
                $habitacion = Habitacion::where('estrellas', $request->input('value'))->get();
                break;
        }
        return $habitacion;

    }

}
