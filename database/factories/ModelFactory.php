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
        'name' => $faker->word,
    ];
});

$factory->define(App\Services::class, function (Faker\Generator $faker) use ($factory) {
    return [
        'name' => $faker->name,
        'services_type_id' =>   rand(11, 20),                    //$factory->raw('App\Services\ServicesTypes'),
        'description' =>  $faker->realText( 200, 2 ),            // generate text with 10 words
        'user_id' => $factory->raw('App\User'),
        'price' =>  $faker->randomNumber( 6, $strict = false )   // Generate number with six digits
    ];
});

$factory->define(App\UsersProfile::class, function (Faker\Generator $faker) use ($factory) {
    $gender = rand(1,2);
    $profesions = ['Lavador','Barredor','Ingeniero','Diseñador','Electricista','Mecanico','Mascotas','Merihuanero','Periquero'];
    return [
        'user_id' => $factory->raw('App\User'),
        'first_name' => ($gender == 1) ? $faker->titleMale .' '. $faker->firstName:$faker->titleFemale .' '. $faker->firstName ,                    //$factory->raw('App\Services\ServicesTypes'),
        'last_name' =>  $faker->lastName,            // generate text with 10 words
        'city_id' => 1,
        'gender' =>  ($gender == 1) ? 'male':'female',  // Generate number with six digits
        'description'=> $faker->realText( 200, 2 ),
        'profession'=>  $profesions[rand(0, 8)],
        'address'=> $faker->streetAddress,
        'geolocalization'=> json_encode( [$faker->latitude($min = 4.0, $max = 4.9999999),$faker->longitude($min = -74.0, $max = -74.9999999) ] ),
        'image'=> $faker->imageUrl($width = 640, $height = 480),
        'phone' => rand(2000000,7999999),
    ];
});
