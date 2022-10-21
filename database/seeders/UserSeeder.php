<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{

    public function run()
    {
        User::create([
            'name' => 'Administrador',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('123')
        ])->assignRole('Administrador');

        User::create([
            'name' => 'Juan David Morales Paredes',
            'email' => 'juan@gmail.com',
            'password' => bcrypt('123')
        ])->assignRole('Empleado');

        User::create([
            'name' => 'Luis Alberto Albarran Jara',
            'email' => 'luis@gmail.com',
            'password' => bcrypt('123')
        ])->assignRole('Empleado');

        User::create([
            'name' => 'Jose Wladimir Esquen Quiroz',
            'email' => 'wladimir@gmail.com',
            'password' => bcrypt('123')
        ])->assignRole('Cajero');
    }
}
