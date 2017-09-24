<?php

use Illuminate\Database\Seeder;

class ServiceStatus extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('services_statuses')->insert([
         'name' => 'In Course',
      ]);
    }
}
