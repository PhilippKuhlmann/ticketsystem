<?php

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\Hash;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

use App\User;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()['cache']->forget('spatie.permission.cache');

        // create permissions
        Permission::create(['name' => 'edit ticket']);
        Permission::create(['name' => 'delete ticket']);
        Permission::create(['name' => 'create ticket']);

        // create roles and assign created permissions

        $role = Role::create(['name' => 'user']);
        $role->givePermissionTo('create ticket', 'edit ticket');

        $role = Role::create(['name' => 'admin']);
        $role->givePermissionTo(['delete ticket']);

        $role = Role::create(['name' => 'root']);
        $role->givePermissionTo(Permission::all());

        $user = User::create([
            'name' => 'root',
            'email' => 'root@test.de',
            'password' => Hash::make('password')
        ]);

        $user->assignRole('root');
    }
}
