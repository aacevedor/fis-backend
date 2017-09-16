<?php

use Illuminate\Database\Seeder;

class CitysTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('citys')->insert([
           'name' => 'Bogotá',
           'country_id' => 1,
       ]);
    }
}
