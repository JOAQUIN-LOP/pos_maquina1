<?php

use Faker\Generator as Faker;

$factory->define(App\factura::class, function (Faker $faker) {
    return [
        'mes' => $faker->monthName,
    	'anio' => $faker->year,
        'fecha' => $faker->date,
        'hora' => $faker->dateTime,
        'direccion' => $faker->address,
    	'total_factura' => $faker->randomFloat,
    ];
});
