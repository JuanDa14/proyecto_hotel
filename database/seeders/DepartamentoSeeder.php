<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartamentoSeeder extends Seeder
{
   
    public function run()
    {
        DB::table('departamentos')->insert(['departamento' => 'Gerencia','estado'=>'Activo']);
        DB::table('departamentos')->insert(['departamento' => 'Ventas','estado'=>'Activo']);
        DB::table('departamentos')->insert(['departamento' => 'Caja','estado'=>'Activo']);
    }
}
