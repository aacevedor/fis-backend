<?php

use Illuminate\Database\Seeder;
use App\Services;
use App\Services\ServicesTypes;


class ServicesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      factory(Services::class, 10)->create()->each(function ($service) {
      });
    }
}
