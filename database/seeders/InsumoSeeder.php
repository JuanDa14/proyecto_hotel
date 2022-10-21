<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InsumoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('insumos')->insert(['insumo' => 'insumo 1',  'descripcion' => 'descripcion 1']);
        DB::table('insumos')->insert(['insumo' => 'insumo 2',  'descripcion' => 'descripcion 2']);
        DB::table('insumos')->insert(['insumo' => 'insumo 3',  'descripcion' => 'descripcion 3']);
        DB::table('insumos')->insert(['insumo' => 'insumo 4', 'descripcion' => 'descripcion 4']);
        DB::table('insumos')->insert(['insumo' => 'insumo 5',  'descripcion' => 'descripcion 5']);
        DB::table('insumos')->insert(['insumo' => 'insumo 6',  'descripcion' => 'descripcion 6']);
        DB::table('insumos')->insert(['insumo' => 'insumo 7',  'descripcion' => 'descripcion 7']);
        DB::table('insumos')->insert(['insumo' => 'insumo 8',  'descripcion' => 'descripcion 8']);
        DB::table('insumos')->insert(['insumo' => 'insumo 9', 'descripcion' => 'descripcion 9']);
        DB::table('insumos')->insert(['insumo' => 'insumo 10',  'descripcion' => 'descripcion 10']);
    }
}
