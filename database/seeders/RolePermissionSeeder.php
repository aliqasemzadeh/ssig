<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $superAdmin = Role::create(['name' => 'super_admin']);

        $admin = Role::create(['name' => 'admin']);

        $groupAdmin = Role::create(['name' => 'group_admin']);

        $groupPermission = Permission::create(['name' => 'edit groups']);

        $user = User::findOrFail(1);

        $user->assignRole('super_admin');

    }
}
