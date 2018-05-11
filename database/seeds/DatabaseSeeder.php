<?php

use App\User;
use App\Customer;
use App\Employee;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;

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
        Permission::create(['name' => 'see all tickets']);
        Permission::create(['name' => 'be editor']);

        // create roles and assign created permissions

        $role = Role::create(['name' => 'root']);
        $role->givePermissionTo(Permission::all());

        $role = Role::create(['name' => 'admin']);
        $role->givePermissionTo(['delete ticket', 'see all tickets']);

        $role = Role::create(['name' => 'user']);
        $role->givePermissionTo('create ticket', 'edit ticket', 'be editor');

        // create basic users

        $user = User::create([
            'firstName' => 'Super',
            'lastName' => 'Admin',
            'username' => 'root',
            'email' => 'root@test.de',
            'password' => Hash::make('password'),
        ]);
        $user->assignRole('root');

        $user = User::create([
            'firstName' => 'Admin',
            'lastName' => 'Admin',
            'username' => 'admin',
            'email' => 'admin@test.de',
            'password' => Hash::make('password'),
        ]);
        $user->assignRole('admin');

        $user = User::create([
            'firstName' => 'User',
            'lastName' => 'One',
            'username' => 'userone',
            'email' => 'userone@test.de',
            'password' => Hash::make('password'),
        ]);
        $user->assignRole('user');

        $user = User::create([
            'firstName' => 'User',
            'lastName' => 'Two',
            'username' => 'usertwo',
            'email' => 'usertwo@test.de',
            'password' => Hash::make('password'),
        ]);
        $user->assignRole('user');

        // create basic customers
        $customer = Customer::create([
            'name' => 'FirmenName XYZ',
            'email' => 'firma@test.de',
        ]);

        // create basic employee
        $employee = Employee::create([
            'customer_id' => $customer->id,
            'firstName' => 'Max',
            'lastName' => 'Mustermann',
            'email' => 'm.mustermann@test.de',
        ]);
    }
}
