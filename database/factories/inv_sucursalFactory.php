<?php

use Faker\Generator as Faker;

$factory->define(App\inv_sucursal::class, function (Faker $faker) {
    return [
        'mes' => $faker->monthName,
    	'anio' => $faker->year,
        'fecha' => $faker->date,
    	'cantidad' => $faker->randomFloat,
        'descripcion' => $faker->name,
    	'precio_compra' => $faker->randomFloat,    
        'total_inv_sucursal' => $faker->randomFloat,
    ];
});
