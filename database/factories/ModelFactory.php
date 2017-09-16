<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});


$factory->define(App\Services\ServicesTypes::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->realText(10,1),
    ];
});


$factory->define(App\Services::class, function (Faker\Generator $faker) use ($factory) {
    return [
        'name' => $faker->name,
        'services_type_id' => $factory->create(App\Services\ServicesTypes::class)->id,
        'description' =>  $faker->realText( 200, 2 ),            // generate text with 10 words
        'users_id' => $factory->create(App\User::class)->id,
        'price' =>  $faker->randomNumber( 6, $strict = false )  // Generate number with six digits
    ];
});
