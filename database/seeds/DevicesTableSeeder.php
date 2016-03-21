<?php

use Illuminate\Database\Seeder;

class DevicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 0; $i < 49; $i++) {
            DB::table('devices')->insert([
                'name' => str_random(10),
                'description' => 'Das ist eine Testbeschreibung. Sie besteht aus mehreren Wörtern. und anderem scheiss.',
                'device_number' => str_random(15),
                'available' => true,
                'active' => true,
                'category' => 1
            ]);
        }
    }
}
