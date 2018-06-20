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
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        DB::table('users')->truncate();

        DB::table('users')->insert([
            [
                "name" => "Rashmi Dhakal",
                "email" => "rashmidhakal@test.com",
                "password" => bcrypt('secret')
            ],
            [
                "name" => "Samantha Chhetri",
                "email" => "sam@test.com",
                "password" => bcrypt('secret')
            ],
            [
                "name" => "Daniel Joe",
                "email" => "danjo@test.com",
                "password" => bcrypt('secret')
            ],
        ]);
    }
}
