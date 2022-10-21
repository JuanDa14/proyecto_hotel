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
            'password' => bcrypt('password'),
        ])->assignRole('administrador');

        User::create([
            'name' => 'Recepcionista',
            'email' => 'recep@gmail.com',
            'password' => bcrypt('password'),
        ])->assignRole('recepcionista');


        User::create([
            'name' => 'Usuario',
            'email' => 'user@gmail.com',
            'password' => bcrypt('password'),
        ])->assignRole('usuario');
    }
}
