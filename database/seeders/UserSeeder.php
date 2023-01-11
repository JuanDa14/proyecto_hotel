<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{

    public function run()
    {

        User::create(['dni' => '74857326', 'name' => 'Luis Alberto', 'estado' => 'ACTIVO', 'direccion' => 'Pueblo nuevo', 'genero' => 'M', 'fechanacimiento' => '2001-09-21', 'apellidos' => 'Silva', 'telefono' => '937382334', 'email' => 'admin@gmail.com', 'password' => bcrypt('password')])->assignRole('administrador');
        User::create(['dni' => '74857326', 'name' => 'Wladimir', 'estado' => 'ACTIVO', 'direccion' => 'Guadalupe Chepén', 'genero' => 'M', 'fechanacimiento' => '2001-06-14', 'apellidos' => 'Esquen', 'telefono' => '937381734', 'email' => 'recep@gmail.com', 'password' => bcrypt('password')])->assignRole('recepcionista');
        User::create(['dni' => '74857326', 'name' => 'Gian Marco', 'estado' => 'ACTIVO', 'direccion' => 'Chepén', 'genero' => 'M', 'fechanacimiento' => '2001-09-22', 'apellidos' => 'Vilca', 'telefono' => '949525116', 'email' => 'user@gmail.com', 'password' => bcrypt('password')])->assignRole('usuario');;
    }
}
