<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'user read',
            'user create',
            'user edit',
            'user delete',
            'role read',
            'role create',
            'role edit',
            'role delete',
            'employee read',
            'employee create',
            'employee edit',
            'employee delete',
            'department read',
            'department create',
            'department edit',
            'department delete',
            'job read',
            'job create',
            'job edit',
            'job delete',
            'treasury read',
            'treasury create',
            'treasury edit',
            'treasury delete',
            'income read',
            'income create',
            'income edit',
            'income delete',
            'expense read',
            'expense create',
            'expense edit',
            'expense delete',
            'income&expense read',
            'income&expense create',
            'income&expense edit',
            'income&expense delete',

        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}
