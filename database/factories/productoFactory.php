<?php

use App\producto;
use Faker\Generator;

$factory->define(producto::class, function (Generator $faker) {
    $array = [
        'nomProducto' => $faker->name,
    	'unidad' => $faker->randomFloat,
    	'precio_compra' => $faker->randomFloat,    
        'existencia' => $faker->randomFloat
    ];
    return $array;
});
