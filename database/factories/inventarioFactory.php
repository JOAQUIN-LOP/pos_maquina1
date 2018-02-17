<?php

use App\inventario;
use Faker\Generator;

$factory->define(inventario::class, function (Generator $faker) {
    $array = [
        'mes' => $faker->name,
    	'anio' => $faker->address,
        'fecha' => $faker->name,
        'descripcion_inventario' => $faker->name,
    	'precio_compra' => $faker->address,    
    	'stock' => $faker->address, 
        'total_inventario' => $faker->name,
    ];
});
