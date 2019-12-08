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
        DB::table('users')->insert([
            'id' => 1,
            'name' => 'Invoice App',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('123456'),
            'role' => 0,
            'status' => 0,
        ]);
    }
}
