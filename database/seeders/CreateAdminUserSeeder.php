<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => '12345678',
            'role_name' => ['SuperAdmin'],
            'Status' => true,
            'auth_id'  => 1
        ]);
        $role = Role::create(['name' => 'SuperAdmin']);
        $permissions = Permission::pluck('id','id')->all();
        $role->syncPermissions($permissions);
        $user->assignRole([$role->id]);

        $user->media()->create([
            'file_name' => 'img-04.jpg' ,
            'file_size' => 7664,
            'file_type' => 'png/image',
            'file_sort' => 1
        ]);

        $role2 = Role::create(['name' => 'Accountant']);
        $permissions2 = Permission::pluck('id','id')->all();
        $role2->syncPermissions($permissions2);

        $role3 = Role::create(['name' => 'shatabna_consultant']);
        $permissions3 = Permission::pluck('id','id')->all();
        $role3->syncPermissions($permissions3);

    }
}
