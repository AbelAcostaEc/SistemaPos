<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class TestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

    // Crea los permisos
    ///USUARIOS
        $permissionVerUsuarios = Permission::create([
            'name' => 'ver usuarios',
            'guard_name' => 'web'
        ]);
        $permissionCrearUsuarios = Permission::create([
            'name' => 'crear usuarios',
            'guard_name' => 'web'
        ]);

        $permissionEditarUsuarios = Permission::create([
            'name' => 'editar usuarios',
            'guard_name' => 'web'
        ]);

        $permissionEliminarUsuarios = Permission::create([
            'name' => 'eliminar usuarios',
            'guard_name' => 'web'
        ]);
        //ROLES
        $permissionVerRoles = Permission::create([
            'name' => 'ver roles',
            'guard_name' => 'web'
        ]);
        $permissionCrearRoles = Permission::create([
            'name' => 'crear roles',
            'guard_name' => 'web'
        ]);

        $permissionEditarRoles = Permission::create([
            'name' => 'editar roles',
            'guard_name' => 'web'
        ]);

        $permissionEliminarRoles = Permission::create([
            'name' => 'eliminar roles',
            'guard_name' => 'web'
        ]);
        //PERMISOS
        $permissionVerPermisos = Permission::create([
            'name' => 'ver permisos',
            'guard_name' => 'web'
        ]);
        $permissionCrearPermisos = Permission::create([
            'name' => 'crear permisos',
            'guard_name' => 'web'
        ]);

        $permissionEditarPermisos = Permission::create([
            'name' => 'editar permisos',
            'guard_name' => 'web'
        ]);

        $permissionEliminarPermisos = Permission::create([
            'name' => 'eliminar permisos',
            'guard_name' => 'web'
        ]);

        // Crea los roles
        $roleAdmin = Role::create([
            'name' => 'administrador',
            'guard_name' => 'web'
        ]);

        // Asigna permisos a roles
        $roleAdmin->givePermissionTo($permissionVerUsuarios);
        $roleAdmin->givePermissionTo($permissionCrearUsuarios);
        $roleAdmin->givePermissionTo($permissionEditarUsuarios);
        $roleAdmin->givePermissionTo($permissionEliminarUsuarios);

        $roleAdmin->givePermissionTo($permissionVerRoles);
        $roleAdmin->givePermissionTo($permissionCrearRoles);
        $roleAdmin->givePermissionTo($permissionEditarRoles);
        $roleAdmin->givePermissionTo($permissionEliminarRoles);

        $roleAdmin->givePermissionTo($permissionVerPermisos);
        $roleAdmin->givePermissionTo($permissionCrearPermisos);
        $roleAdmin->givePermissionTo($permissionEditarPermisos);
        $roleAdmin->givePermissionTo($permissionEliminarPermisos);

        $userAdmin = new User();
        $userAdmin->name = 'Abel Acosta';
        $userAdmin->email = 'admin@asaa.com';
        $userAdmin->password = Hash::make('12345678');
        $userAdmin->save();

        $userAdmin->assignRole($roleAdmin);
    }
}
