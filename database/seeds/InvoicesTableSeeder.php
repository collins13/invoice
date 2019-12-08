<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class InvoicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('invoices')->insert([
            'id' => 1,
            'appName' => 'Invoice Solutions',
            'avatar' => '/public/system/avatar.webp',
            'description' => 'Every organisation should implement this invoice system',
            'status' => 0,
            'dateInstallation' => Carbon::now(),
        ]);
    }
}
