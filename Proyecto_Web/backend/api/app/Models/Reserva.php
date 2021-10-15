<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    public $timestamps = false;
    protected $table = 'reservas';
    protected $fillable = ['habitacion_id','fecha_inicio', 'fecha_fin', 'huespedes', 'doc_cliente'];

    public function cliente(){
        return $this->belongsTo(cliente::class);
    }

    public function habitacion(){
        return $this->belongTo(habitacion::class);
    }
}
