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
                'nombre' => 'HR Suplidora',
                'direccion' => 'Av. Los Heroes 123',
                'telefono' => '987654321',
                'correo' => 'hrspli@gmail.com',
                'estrellas' => '1',
            ]
        );
        DB::table('proveedor')->insert(
            [
                'nombre' => 'Salmos Suplidora',
                'direccion' => 'Av. Los Heroes 321',
                'telefono' => '123456789',
                'correo' => 'ssplidora@gmail.com',
                'estrellas' => '2',
            ]
        );
        DB::table('proveedor')->insert(
            [
                'nombre' => 'OPESA',
                'direccion' => 'Av. Los Heroes 321',
                'telefono' => '123456789',
                'correo' => 'opesa_info@gmail.com',
                'estrellas' => '3',
            ]
        );
        DB::table('proveedor')->insert(
            [
                'nombre' => 'Hubspot',
                'direccion' => 'Av. Los Heroes 321',
                'telefono' => '123456789',
                'correo' => 'hb@gmail.com',
                'estrellas' => '4',
            ]
        );
        DB::table('proveedor')->insert(
            [
                'nombre' => 'Peru Compras',
                'direccion' => 'Av. Los Heroes 321',
                'telefono' => '123456789',
                'correo' => 'perucompra@gmail.com',
                'estrellas' => '5',
            ]
        );
    }
}
