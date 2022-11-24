<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProveedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('proveedor')->insert(
            [
                'nombre' => 'Proveedor 1',
                'direccion' => 'Av. Los Heroes 123',
                'telefono' => '987654321',
                'correo' => 'proveedor1@gmail.com',
                'estrellas' => '1',
            ]
        );
        DB::table('proveedor')->insert(
            [
                'nombre' => 'Proveedor 2',
                'direccion' => 'Av. Los Heroes 321',
                'telefono' => '123456789',
                'correo' => 'proveedor2@gmail.com',
                'estrellas' => '2',
            ]
        );
        DB::table('proveedor')->insert(
            [
                'nombre' => 'Proveedor 3',
                'direccion' => 'Av. Los Heroes 321',
                'telefono' => '123456789',
                'correo' => 'proveedor3@gmail.com',
                'estrellas' => '3',
            ]
        );
        DB::table('proveedor')->insert(
            [
                'nombre' => 'Proveedor 4',
                'direccion' => 'Av. Los Heroes 321',
                'telefono' => '123456789',
                'correo' => 'proveedor4@gmail.com',
                'estrellas' => '4',
            ]
        );
        DB::table('proveedor')->insert(
            [
                'nombre' => 'Proveedor 5',
                'direccion' => 'Av. Los Heroes 321',
                'telefono' => '123456789',
                'correo' => 'proveedor5gmail.com',
                'estrellas' => '5',
            ]
        );
    }
}
