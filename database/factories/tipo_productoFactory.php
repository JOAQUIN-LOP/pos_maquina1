<?php

use Faker\Generator as Faker;

$factory->define(App\tipo_producto::class, function (Faker $faker) {
    return [
        'tipoProducto' => $faker->name,
    ];
});
