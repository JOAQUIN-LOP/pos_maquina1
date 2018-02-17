<?php

use App\factura;
use Faker\Generator;

$factory->define(factura::class, function (Generator $faker) {
    $array = [
        'mes' => $faker->monthName,
    	'anio' => $faker->year,
        'fecha' => $faker->date,
        'hora' => $faker->dateTime,
        'direccion' => $faker->address,
    	'total_factura' => $faker->randomFloat,    
    ];
});
