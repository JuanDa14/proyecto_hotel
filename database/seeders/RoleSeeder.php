<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder


{
    public function run()
    {
        $rol1 = Role::create(['name' => 'Administrador']);
        $rol2 = Role::create(['name' => 'Empleado']);
        $rol3 = Role::create(['name' => 'Cajero']);

        
        Permission::create(['name' => 'ver.dashboard'])->assignRole([$rol1, $rol3]);
        Permission::create(['name' => 'entrar.dashboard'])->assignRole([$rol1, $rol2, $rol3]);
        Permission::create(['name' => 'ver.dashboardCompleto'])->assignRole($rol1);

        Permission::create(['name' => 'ver.producto'])->syncRoles([$rol1, $rol2, $rol3]);
        Permission::create(['name' => 'create.producto'])->assignRole($rol1);
        Permission::create(['name' => 'edit.producto'])->assignRole($rol1);
        Permission::create(['name' => 'destroy.producto'])->assignRole($rol1);

        Permission::create(['name' => 'ver.insumo'])->assignRole($rol1);
        Permission::create(['name' => 'create.insumo'])->assignRole($rol1);
        Permission::create(['name' => 'edit.insumo'])->assignRole($rol1);
        Permission::create(['name' => 'destroy.insumo'])->assignRole($rol1);

        Permission::create(['name' => 'ver.departamento'])->assignRole($rol1);
        Permission::create(['name' => 'create.departamento'])->assignRole($rol1);
        Permission::create(['name' => 'edit.departamento'])->assignRole($rol1);
        Permission::create(['name' => 'destroy.departamento'])->assignRole($rol1);

        Permission::create(['name' => 'ver.empleado'])->assignRole($rol1);
        Permission::create(['name' => 'create.empleado'])->assignRole($rol1);
        Permission::create(['name' => 'edit.empleado'])->assignRole($rol1);
        Permission::create(['name' => 'destroy.empleado'])->assignRole($rol1);

        Permission::create(['name' => 'ver.venta'])->assignRole([$rol1, $rol3]);
        Permission::create(['name' => 'create.venta'])->syncRoles([$rol1, $rol3]);
        Permission::create(['name' => 'show.venta'])->assignRole([$rol1, $rol3]);
        Permission::create(['name' => 'destroy.venta'])->assignRole($rol1);

        Permission::create(['name' => 'ver.ordenCompra'])->assignRole($rol1);
        Permission::create(['name' => 'create.ordenCompra'])->assignRole($rol1);
        Permission::create(['name' => 'show.ordenCompra'])->assignRole($rol1);
        Permission::create(['name' => 'destroy.ordenCompra'])->assignRole($rol1);

        Permission::create(['name' => 'ver.impuesto'])->assignRole($rol1);
        Permission::create(['name' => 'create.impuesto'])->assignRole($rol1);
        Permission::create(['name' => 'show.impuesto'])->assignRole($rol1);
        Permission::create(['name' => 'reporte.impuesto'])->assignRole($rol1);


        Permission::create(['name' => 'ver.graficos'])->assignRole([$rol1, $rol2, $rol3]);
    }
}
