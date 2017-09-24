<?php

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      factory(App\User::class, 20)->create()->each(function ($u) {
        $u->profile()->save(factory(App\UsersProfile::class)->make());
        $u->services()->save(factory(App\Services::class)->make());
      });
    }
}
