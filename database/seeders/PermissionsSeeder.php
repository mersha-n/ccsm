<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;

class PermissionsSeeder extends Seeder
{
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // Create default permissions
        Permission::create(['name' => 'list appointments']);
        Permission::create(['name' => 'view appointments']);
        Permission::create(['name' => 'create appointments']);
        Permission::create(['name' => 'update appointments']);
        Permission::create(['name' => 'delete appointments']);

        Permission::create(['name' => 'list attorneys']);
        Permission::create(['name' => 'view attorneys']);
        Permission::create(['name' => 'create attorneys']);
        Permission::create(['name' => 'update attorneys']);
        Permission::create(['name' => 'delete attorneys']);

        Permission::create(['name' => 'list bars']);
        Permission::create(['name' => 'view bars']);
        Permission::create(['name' => 'create bars']);
        Permission::create(['name' => 'update bars']);
        Permission::create(['name' => 'delete bars']);

        Permission::create(['name' => 'list casecharges']);
        Permission::create(['name' => 'view casecharges']);
        Permission::create(['name' => 'create casecharges']);
        Permission::create(['name' => 'update casecharges']);
        Permission::create(['name' => 'delete casecharges']);

        Permission::create(['name' => 'list casehears']);
        Permission::create(['name' => 'view casehears']);
        Permission::create(['name' => 'create casehears']);
        Permission::create(['name' => 'update casehears']);
        Permission::create(['name' => 'delete casehears']);

        Permission::create(['name' => 'list courts']);
        Permission::create(['name' => 'view courts']);
        Permission::create(['name' => 'create courts']);
        Permission::create(['name' => 'update courts']);
        Permission::create(['name' => 'delete courts']);

        Permission::create(['name' => 'list decisions']);
        Permission::create(['name' => 'view decisions']);
        Permission::create(['name' => 'create decisions']);
        Permission::create(['name' => 'update decisions']);
        Permission::create(['name' => 'delete decisions']);

        Permission::create(['name' => 'list judges']);
        Permission::create(['name' => 'view judges']);
        Permission::create(['name' => 'create judges']);
        Permission::create(['name' => 'update judges']);
        Permission::create(['name' => 'delete judges']);

        Permission::create(['name' => 'list wittnesses']);
        Permission::create(['name' => 'view wittnesses']);
        Permission::create(['name' => 'create wittnesses']);
        Permission::create(['name' => 'update wittnesses']);
        Permission::create(['name' => 'delete wittnesses']);

        // Create user role and assign existing permissions
        $currentPermissions = Permission::all();
        $userRole = Role::create(['name' => 'user']);
        $userRole->givePermissionTo($currentPermissions);

        // Create admin exclusive permissions
        Permission::create(['name' => 'list roles']);
        Permission::create(['name' => 'view roles']);
        Permission::create(['name' => 'create roles']);
        Permission::create(['name' => 'update roles']);
        Permission::create(['name' => 'delete roles']);

        Permission::create(['name' => 'list permissions']);
        Permission::create(['name' => 'view permissions']);
        Permission::create(['name' => 'create permissions']);
        Permission::create(['name' => 'update permissions']);
        Permission::create(['name' => 'delete permissions']);

        Permission::create(['name' => 'list users']);
        Permission::create(['name' => 'view users']);
        Permission::create(['name' => 'create users']);
        Permission::create(['name' => 'update users']);
        Permission::create(['name' => 'delete users']);

        // Create admin role and assign all permissions
        $allPermissions = Permission::all();
        $adminRole = Role::create(['name' => 'super-admin']);
        $adminRole->givePermissionTo($allPermissions);

        $user = \App\Models\User::whereEmail('admin@admin.com')->first();

        if ($user) {
            $user->assignRole($adminRole);
        }
    }
}
