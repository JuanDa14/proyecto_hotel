<?php

namespace Database\Seeders;

use App\Models\TipoHabitacion;
use Illuminate\Database\Seeder;

class TipoHabitacionSeeder extends Seeder
{

    public function run()
    {
        TipoHabitacion::create([
            'descripcion' => 'Familiar',
            'precio' => 320
        ]);
        TipoHabitacion::create([
            'descripcion' => 'Doble',
            'precio' => 120
        ]);
        TipoHabitacion::create([
            'descripcion' => 'Matrimonial',
            'precio' => 250
        ]);
        TipoHabitacion::create([
            'descripcion' => 'Individual',
            'precio' => 50
        ]);
    }
}
