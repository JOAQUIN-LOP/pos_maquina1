<?php

use Faker\Generator as Faker;

$factory->define(App\sucursal::class, function (Faker $faker) {
    return [
        'nom_sucursal' => $faker->name,
    ];
});
