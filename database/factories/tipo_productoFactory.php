<?php

use App\tipo_producto;
use Faker\Generator;

$factory->define(tipo_producto::class, function (Generator $faker) {
    $array = [
        'tipoProducto' => $faker->name
    ];
    return $array;
});
