<?php

use Faker\Generator as Faker;

$factory->define(App\detalle_factura::class, function (Faker $faker) {
    return [
        'cantidad' => $faker->randomFloat,
        'descripcion' => $faker->name,
    	'precio_unit' => $faker->randomFloat,    
        'total_venta' => $faker->randomFloat,
    ];
});
