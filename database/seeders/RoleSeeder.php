<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder


{
    public function run()
    {
        $admin = Role::create(['name' => 'administrador']);
        $recep = Role::create(['name' => 'recepcionista']);
        $user = Role::create(['name' => 'usuario']);
        $cont = Role::create(['name' => 'contador']);

        Permission::create(['name' => 'ver.dashboard'])->assignRole([$admin, $recep, $user, $cont]);

        Permission::create(['name' => 'user.dashboard'])->assignRole([$admin, $user]);
        Permission::create(['name' => 'admin.dashboard'])->assignRole($admin);
        Permission::create(['name' => 'recep.dashboard'])->assignRole([$recep, $admin]);
        Permission::create(['name' => 'contador.dashboard'])->assignRole([$cont, $admin]);

        Permission::create(['name' => 'user.view'])->assignRole([$user, $admin]);
        Permission::create(['name' => 'user.create'])->assignRole($admin);
        Permission::create(['name' => 'user.update'])->assignRole($admin);
        Permission::create(['name' => 'user.show'])->assignRole($admin);

        Permission::create(['name' => 'habitacion.view'])->assignRole([$user, $admin, $recep]);
        Permission::create(['name' => 'habitacion.create'])->assignRole($admin);
        Permission::create(['name' => 'habitacion.update'])->assignRole($admin);
        Permission::create(['name' => 'habitacion.show'])->assignRole($admin);

        Permission::create(['name' => 'tipo_habitacion.view'])->assignRole([$user, $admin, $recep]);
        Permission::create(['name' => 'tipo_habitacion.create'])->assignRole($admin);
        Permission::create(['name' => 'tipo_habitacion.update'])->assignRole($admin);
        Permission::create(['name' => 'tipo_habitacion.show'])->assignRole($admin);
    }
}
