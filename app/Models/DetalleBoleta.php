<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleBoleta extends Model
{
    use HasFactory;
    protected $table = 'detalle_boletas';
    protected $primaryKey = 'iddetalleBoleta';
    protected $fillable = ['cantidad', 'precio', 'importe', 'idProducto', 'idBoleta'];
    public $timestamps = false;
}
