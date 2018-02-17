<?php

use App\inv_sucursal;
use Faker\Generator;

$factory->define(inv_sucursal::class, function (Generator $faker) {
    $array = [
        'mes' => $faker->monthName,
    	'anio' => $faker->year,
        'fecha' => $faker->date,
    	'cantidad' => $faker->randomFloat,
        'descripcion' => $faker->name,
    	'precio_compra' => $faker->randomFloat,    
        'total_inv_sucursal' => $faker->randomFloat
    ];
    return $array;
});
