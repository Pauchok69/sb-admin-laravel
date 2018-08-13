<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert(
            [
                "id"         => 1,
                "name"       => "super_admin",
                'created_at' => new DateTime(),
                'updated_at' => new DateTime()
            ]
        );
        DB::table('roles')->insert(
            [
                "id"         => 2,
                "name"       => "admin",
                'created_at' => new DateTime(),
                'updated_at' => new DateTime()
            ]
        );
        DB::table('roles')->insert(
            [
                "id"         => 3,
                "name"       => "manager",
                'created_at' => new DateTime(),
                'updated_at' => new DateTime()
            ]
        );
        DB::table('roles')->insert(
            [
                "id"         => 4,
                "name"       => "user",
                'created_at' => new DateTime(),
                'updated_at' => new DateTime()
            ]
        );
    }
}
