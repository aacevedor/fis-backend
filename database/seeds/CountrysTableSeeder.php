<?php

use Illuminate\Database\Seeder;

class CountrysTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('countrys')->insert([
         'name' => 'Colombia',
      ]);
    }
}
