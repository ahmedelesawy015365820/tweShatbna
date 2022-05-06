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
    }
}
