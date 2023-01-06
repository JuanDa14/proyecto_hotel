<?php

namespace Database\Seeders;

use App\Models\Habitacion;
use Illuminate\Database\Seeder;

class HabitacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Habitacion::create([
            'numeroHabitacion' => 1,
            'tipoHabitacion_id' => 1,
            'piso' => '1',
            'nroCamas' => '3',
            'estado' => 'libre'
        ]);
        Habitacion::create([
            'numeroHabitacion' => 3,
            'tipoHabitacion_id' => 3,
            'piso' => '1',
            'nroCamas' => '1',
            'estado' => 'ocupado'
        ]);
        Habitacion::create([
            'numeroHabitacion' => 4,
            'tipoHabitacion_id' => 2,
            'piso' => '2',
            'nroCamas' => '2',
            'estado' => 'libre'
        ]);
        Habitacion::create([
            'numeroHabitacion' => 6,
            'tipoHabitacion_id' => 4,
            'piso' => '2',
            'nroCamas' => '1',
            'estado' => 'libre'
        ]);
    }
}
