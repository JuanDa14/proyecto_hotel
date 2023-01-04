<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            TipoPagoSeeder::class,
            RoleSeeder::class,
            UserSeeder::class,
            TipoHabitacionSeeder::class,
            HabitacionSeeder::class,
            ClienteSeeder::class,
            ProveedorSeeder::class,
            ReservaSeeder::class,
            DetalleReservaSeeder::class,
        ]);
    }
}
