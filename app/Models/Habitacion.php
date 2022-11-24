<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Habitacion extends Model
{
    use HasFactory;

    protected $table = 'habitaciones';

    protected $fillable = [
        'numeroHabitacion',
        'piso',
        'nroCamas',
        'estado',
        'tipoHabitacion_id'
    ];

    public function tipohabitacion()
    {
        return $this->belongsTo(TipoHabitacion::class);
    }
}
