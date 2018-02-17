<?php

use App\empresa;
use Faker\Generator;

$factory->define(empresa::class, function (Generator $faker) {
    $array = [
        'nom_empresa' => $faker->name,
    	'direccion' => $faker->address
    ];
    return $array;
});
