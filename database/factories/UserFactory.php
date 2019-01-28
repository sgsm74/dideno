<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'firstName' => $faker->firstName,
        'lastName' => $faker->lastName,
        'fatherName' => $faker->firstName,
        'SN' => '3350209701',
        'phoneNumber' => '09375743511',
        'major' => 'نرم افزار',
        'university' => 'رازی',
        'grade' => 'bachelor',
        'city' => $faker->city,
        'birthday' => $faker->dateTime,
        'gender' =>'male',
        'avatar' =>'img/user-default-thumbnail.gif',
        'role' =>'user',
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
    ];
});
