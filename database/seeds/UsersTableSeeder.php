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
                'name'       => 'jakson',
                'email'      => 'jakson@mail.com',
                'password'   => Hash::make('boxisgreet'),
                'created_at' => new DateTime(),
                'updated_at' => new DateTime()
            ]
        );
    }
}
