<?php

use App\sucursal;
use Faker\Generator;

$factory->define(sucursal::class, function (Generator $faker) {
    $array = [
        'nom_sucursal' => $faker->name,
    ];
});
