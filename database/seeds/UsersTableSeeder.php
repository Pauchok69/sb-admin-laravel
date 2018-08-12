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
        DB::table('users')->insert(
            [
                'first_name' => 'Michael',
                'last_name'  => 'Jakson',
                'email'      => 'jakson@mail.com',
                'password'   => Hash::make('boxisgreat'),
                'created_at' => new DateTime(),
                'updated_at' => new DateTime()
            ]
        );
    }
}
