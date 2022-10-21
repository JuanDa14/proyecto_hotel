<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductoSeeder extends Seeder
{
    public function run()

    {
        DB::table('productos')->insert(['producto' => 'Torta de 3 Leches', 'descripcion' => 'descripcion 1', 'estado' => 'disponible']);
        DB::table('productos')->insert(['producto' => 'Marraquetas', 'descripcion' => 'descripcion 2', 'estado' => 'disponible']);
        DB::table('productos')->insert(['producto' => 'Caracoles', 'descripcion' => 'descripcion 3', 'estado' => 'disponible']);
        DB::table('productos')->insert(['producto' => 'Servilletas', 'descripcion' => 'descripcion 4', 'estado' => 'disponible']);
        DB::table('productos')->insert(['producto' => 'Pionono', 'descripcion' => 'descripcion 5', 'estado' => 'disponible']);
        DB::table('productos')->insert(['producto' => 'Torta de Chocolate', 'descripcion' => 'descripcion 6', 'estado' => 'disponible']);
        DB::table('productos')->insert(['producto' => 'Pan Frances', 'descripcion' => 'descripcion 7', 'estado' => 'disponible']);
        DB::table('productos')->insert(['producto' => 'Pan inteliano', 'descripcion' => 'descripcion 8', 'estado' => 'disponible']);
        DB::table('productos')->insert(['producto' => 'Churros', 'descripcion' => 'descripcion 9', 'estado' => 'disponible']);
        DB::table('productos')->insert(['producto' => 'Alfajores', 'descripcion' => 'descripcion 10', 'estado' => 'disponible']);
    }
}
