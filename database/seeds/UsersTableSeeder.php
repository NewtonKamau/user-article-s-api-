<?php

use Illuminate\Database\Seeder;



class UsersTableSeeder extends Seeder
{
    public function run()
    {
        User::truncate();

        $faker = \Faker\Factory::create();
        //hash the password to improve seeder
        $password = Hash::make('toptal');

        User::create([
            'name' => 'Administrator',
            'email' => 'admin@test.com',
            'password' => '$password'
         ]);
        //
        for ($i =0; $i  < 10; $i ++) {
            User::create([
             'name' => $faker->name,
            'email' => $faker->email,
            'password' => $faker->$password,
            ]);
        }
    }
}
