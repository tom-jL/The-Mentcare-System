<?php

use App\Permission;
use App\Role;
use Illuminate\Database\Seeder;

class PermissionRoleTableSeeder extends Seeder
{
    public function run()
    {
        $admin_permissions = Permission::all();
        Role::findOrFail(1)->permissions()->sync($admin_permissions->pluck('id'));
        $admin_permissions = Permission::all();
        $user_permissions = $admin_permissions->filter(function ($permission)
        {
            return
                substr($permission->title, 0, 5) != 'user_' &&
                substr($permission->title, 0, 5) != 'role_' &&
                substr($permission->title, 0, 11) != 'permission_';
        });
        Role::findOrFail(2)->permissions()->sync($user_permissions);

        //Reception Staff Permissions
        Role::findOrFail(3)->permissions()->sync(App\Permission::find([19, 21, 24, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36]));
        //Doctor Permissions
        Role::findOrFail(4)->permissions()->sync(App\Permission::find([17, 18, 19, 21, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41]));
        //Nurse Permissions
        Role::findOrFail(5)->permissions()->sync(App\Permission::find([19, 21, 28, 29, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41]));
    }
}
