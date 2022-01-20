<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::create([
            'name' => 'Superadmin',
            'guard_name' => 'web'
        ]);

        $permisson = Permission::create(['name' => 'read-items']);

        $role->givePermissionTo($permisson);

        Role::create([
            'name' => 'Admin',
            'guard_name' => 'web'
        ]);

        Role::create([
            'name' => 'User',
            'guard_name' => 'web'
        ]);
    }
}
