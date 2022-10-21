<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmpleadoSeeder extends Seeder
{

    public function run()
    {
        DB::table('empleados')->insert([
            'dni' => '75583132', 'nombre' => 'Administrador', 'apellidos' => '',
            'celular' => '920010312', 'direccion' => '', 'idtipoEmpleado' => '1', 'iddepartamento' => '1', 'idusuario' => '1', 'idrol' => '1', 'estado' => 'contratado'
        ]);

        DB::table('empleados')->insert([
            'dni' => '75586458', 'nombre' => 'Juan David', 'apellidos' => 'Morales Paredes',
            'celular' => '965659203', 'direccion' => 'Alianza Lima #434', 'idtipoEmpleado' => '2', 'iddepartamento' => '2', 'idusuario' => '2', 'idrol' => '2', 'estado' => 'contratado'
        ]);

        DB::table('empleados')->insert([
            'dni' => '75013458', 'nombre' => 'Luis Alberto', 'apellidos' => 'Albarran Jara',
            'celular' => '901445782', 'direccion' => 'Jiron Hipolito Unanue #543', 'idtipoEmpleado' => '2', 'iddepartamento' => '2', 'idusuario' => '3', 'idrol' => '2', 'estado' => 'contratado'
        ]);

        DB::table('empleados')->insert([
            'dni' => '72000361', 'nombre' => 'Jose Wladimir', 'apellidos' => 'Esquen Quiroz',
            'celular' => '902335874', 'direccion' => 'Manuel Soane #733', 'idtipoEmpleado' => '2', 'iddepartamento' => '3', 'idusuario' => '4', 'idrol' => '3', 'estado' => 'contratado'
        ]);
    }
}
