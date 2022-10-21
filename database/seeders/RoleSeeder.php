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


        Permission::create(['name' => 'admin.dashboard'])->assignRole($admin);
        Permission::create(['name' => 'recep.dashboard'])->assignRole($recep);
        Permission::create(['name' => 'user.dashboard'])->assignRole($user);
    }
}
