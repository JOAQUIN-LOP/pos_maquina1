<?php

use App\detalle_factura;
use Faker\Generator;

$factory->define(detalle_factura::class, function (Generator $faker) {
    $array = [
    	'cantidad' => $faker->randomFloat,
        'descripcion' => $faker->name,
    	'precio_unit' => $faker->randomFloat,    
        'total_venta' => $faker->randomFloat
    ];

    return $array;
});
