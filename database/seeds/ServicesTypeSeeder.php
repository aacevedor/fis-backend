<?php

use Illuminate\Database\Seeder;
use App\Services;
use App\Services\ServicesTypes;

class ServicesTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      factory(ServicesTypes::class, 10)->create()->each(function ($service_type) {
        #$service_type->services()->save(factory(Services::class)->make());
      });
    }
}
