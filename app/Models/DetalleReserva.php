<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleReserva extends Model
{
    use HasFactory;

    protected $table = 'detalle_reserva';

    protected $fillable = [
        'cantidad',
        'precio',
        'importe',
        'idhabitacion',
        'idreserva',
    ];
}
