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

$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Maid::class, function (Faker\Generator $faker) {

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'phone' => $faker->phoneNumber,
        'rate' => $faker->randomFloat(2,5,20),
        'img' => 'maid-' . $faker->numberBetween(1,5)
    ];
});
$factory->define(App\WorkHours::class, function (Faker\Generator $faker) {
    $start = $faker->numberBetween(6,15);
    $end = $start + $faker->numberBetween(4,8);
    return [
        'start' => strtotime('01/01/1970' . $start . ':00:00'),
        'end' => strtotime('01/01/1970' . $end . ':00:00')
    ];
});

