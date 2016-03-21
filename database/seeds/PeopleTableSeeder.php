<?php

use Illuminate\Database\Seeder;

class PeopleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 0; $i < 49; $i++) {
            DB::table('people')->insert([
                'name' => str_random(10),
                'mail' => str_random(10).'@gmail.com',
                'matriculation' => str_random(15),
                'class' => str_random(8)
            ]);
        }
    }
}
