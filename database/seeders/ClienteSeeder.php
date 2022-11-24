<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cliente')->insert([
            'dni' => 12345678,
            'nombres' => 'Juan Perez',
            'direccion' => 'Av. Los Heroes 123',
            'telefono' => '987654321',
            'genero' => 'M',
        ]);
        DB::table('cliente')->insert([
            'dni' => 87654321,
            'nombres' => 'Maria Lopez',
            'direccion' => 'Av. Los Heroes 321',
            'telefono' => '123456789',
            'genero' => 'F',
        ]);
    }
}
