<?php

use Faker\Generator as Faker;

$factory->define(App\Empresa::class, function (Faker $faker) {
    return [
        'nom_empresa' => $faker->name,
    	'direccion' => $faker->address,
    ];
});
