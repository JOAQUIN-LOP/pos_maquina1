<?php

use App\inv_sucursal;
use Faker\Generator;

$factory->define(inv_sucursal::class, function (Generator $faker) {
    $array = [
        'mes' => $faker->name,
    	'anio' => $faker->address,
        'fecha' => $faker->name,
    	'cantidad' => $faker->address,
        'descripcion' => $faker->name,
    	'precio_compra' => $faker->address,    
        'total_inv_sucursal' => $faker->name,
    ];
});
