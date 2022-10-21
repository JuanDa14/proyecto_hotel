<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(DepartamentoSeeder::class);
        $this->call(TipoEmpleadoSeeder::class);
        $this->call(EmpleadoSeeder::class);
        $this->call(InsumoSeeder::class);
        $this->call(ProductoSeeder::class);
        $this->call(TipoPagoSeeder::class);
    }
}
