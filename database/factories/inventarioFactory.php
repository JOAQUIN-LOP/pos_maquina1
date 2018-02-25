<?php

use Faker\Generator as Faker;

$factory->define(App\inventario::class, function (Faker $faker) {
    return [
        'mes' => $faker->monthName,
    	'anio' => $faker->year,
        'fecha' => $faker->date,
        'cantidad' => $faker->randomFloat,
        'descripcion_inventario' => $faker->name,
    	'precio_compra' => $faker->randomFloat,    
    	'stock' => $faker->randomFloat, 
        'total_inventario' => $faker->randomFloat,
    ];
});
