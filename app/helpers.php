<?php

use App\User;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

if (!function_exists('initialize_task_permissions')) {
    function initialize_task_permissions()
    {
        Permission::firstOrCreate(['name' => 'list-tasks']);
        Permission::firstOrCreate(['name' => 'show-task']);
        Permission::firstOrCreate(['name' => 'store-task']);
        Permission::firstOrCreate(['name' => 'update-task']);
        Permission::firstOrCreate(['name' => 'destroy-task']);

        $role = Role::firstOrCreate(['name' => 'task-manager']);

        $role->givePermissionTo('list-tasks');
        $role->givePermissionTo('show-task');
        $role->givePermissionTo('store-task');
        $role->givePermissionTo('update-task');
        $role->givePermissionTo('destroy-task');
    }
}

if (!function_exists('create_user')) {
    function create_user()
    {
        factory(User::class)->create([
            'name'     => env('TASKS_USER_NAME', 'Sergi Tur Badenas'),
            'email'    => env('TASKS_USER_EMAIL', 'sergiturbadenas@gmail.com'),
            'password' => bcrypt(env('TASKS_USER_PASSWORD')),
        ]);
    }
}

if (!function_exists('first_user_as_task_manager')) {
    function first_user_as_task_manager()
    {
        User::all()->first()->assignRole('task-manager');
    }
}
