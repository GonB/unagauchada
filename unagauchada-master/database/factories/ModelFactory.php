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
        'nick' => $faker->unique()->text(10),
        'birthdate' => date('Y-m-d'),
    ];
});

$factory->define(App\Gauchada::class, function (Faker\Generator $faker) {

    return [
        'titulo' => $faker->unique()->text(25),
        'descripcion' => $faker->unique()->text(300),
        'fecha_limite' => date('Y-m-d'),
    ];
});