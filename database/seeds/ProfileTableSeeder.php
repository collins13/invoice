<?php

use Illuminate\Database\Seeder;

class ProfileTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('profiles')->insert([
            'id' => 1,
            'companyLogo' => '/public/system/avatar.webp',
            'rate' => 1.5,
            'tax' => 1.0,
        ]);
    }
}
