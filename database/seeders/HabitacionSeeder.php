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
            'tipoHabitacion_id' => 1
        ]);
        Habitacion::create([
            'numeroHabitacion' => 2,
            'tipoHabitacion_id' => 1
        ]);
        Habitacion::create([
            'numeroHabitacion' => 3,
            'tipoHabitacion_id' => 3
        ]);
        Habitacion::create([
            'numeroHabitacion' => 4,
            'tipoHabitacion_id' => 2
        ]);
        Habitacion::create([
            'numeroHabitacion' => 5,
            'tipoHabitacion_id' => 2
        ]);
        Habitacion::create([
            'numeroHabitacion' => 6,
            'tipoHabitacion_id' => 4
        ]);
        Habitacion::create([
            'numeroHabitacion' => 7,
            'tipoHabitacion_id' => 4
        ]);
        Habitacion::create([
            'numeroHabitacion' => 8,
            'tipoHabitacion_id' => 4
        ]);
    }
}
