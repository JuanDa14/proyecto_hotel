<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoEmpleadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipo_empleados')->insert(['tipoEmpleado' => 'Gerente']);
        DB::table('tipo_empleados')->insert(['tipoEmpleado' => 'Empleado']);
    }
}
