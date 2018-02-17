<?php

use App\inventario;
use Faker\Generator;

$factory->define(inventario::class, function (Generator $faker) {
    $array = [
        'mes' => $faker->monthName,
    	'anio' => $faker->year,
        'fecha' => $faker->date,
        'cantidad' => $faker->randomFloat,
        'descripcion_inventario' => $faker->name,
    	'precio_compra' => $faker->randomFloat,    
    	'stock' => $faker->randomFloat, 
        'total_inventario' => $faker->randomFloat
    ];
    return $array;
});
