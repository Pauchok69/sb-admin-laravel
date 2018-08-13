<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_super_admin_id = \App\Role::where('name', 'super_admin')->first()->id;
        $role_admin_id       = \App\Role::where('name', 'admin')->first()->id;
        $role_manager_id     = \App\Role::where('name', 'manager')->first()->id;
        $role_user_id        = \App\Role::where('name', 'user')->first()->id;

        DB::table('users')->insert(
            [
                'first_name' => 'super_admin',
                'last_name'  => 'super_admin',
                'email'      => 'super_admin@mail.com',
                'password'   => Hash::make('superadminpass'),
                'role_id'    => $role_super_admin_id,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime()
            ]
        );
        DB::table('users')->insert(
            [
                'first_name' => 'Admin',
                'last_name'  => 'Admin',
                'email'      => 'admin@mail.com',
                'password'   => Hash::make('adminpass'),
                'role_id'    => $role_admin_id,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime()
            ]
        );
        DB::table('users')->insert(
            [
                'first_name' => 'Manager',
                'last_name'  => 'Manager',
                'email'      => 'manager@mail.com',
                'password'   => Hash::make('managerpass'),
                'role_id'    => $role_manager_id,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime()
            ]
        );
        DB::table('users')->insert(
            [
                'first_name' => 'User',
                'last_name'  => 'User',
                'email'      => 'user@mail.com',
                'password'   => Hash::make('userpass'),
                'role_id'    => $role_user_id,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime()
            ]
        );
    }
}
