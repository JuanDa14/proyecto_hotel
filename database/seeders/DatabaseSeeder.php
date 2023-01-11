<?php

namespace Database\Seeders;

use App\Models\Producto;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            TipoPagoSeeder::class,
            RoleSeeder::class,
            UserSeeder::class,
            ModelHasRoleSeeder::class,
            TipoHabitacionSeeder::class,
            HabitacionSeeder::class,
            ClienteSeeder::class,
            ProveedorSeeder::class,
            ReservaSeeder::class,
            DetalleReservaSeeder::class,
            Producto::class
        ]);
    }
}
