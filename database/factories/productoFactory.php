<?php

use Faker\Generator as Faker;

$factory->define(App\producto::class, function (Faker $faker) {
    return [
        'nomProducto' => $faker->name,
    	'unidad' => $faker->randomFloat,
    	'precio_compra' => $faker->randomFloat,    
        'existencia' => $faker->randomFloat,
    ];
});
