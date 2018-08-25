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
    $flag_vence = $faker->boolean(10);
    if ($flag_vence) $fecha_vence = $faker->date('Y-m-d'); else $fecha_vence = NULL;
    return [
        'usuario' => $faker->unique()->userName,
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'flag_vence' => $flag_vence,
        'fecha_vence' => $fecha_vence,
        'status' => $faker->boolean(90),
    ];
});
