<?php

use Faker\Generator as Faker;

$factory->define(App\empresa::class, function (Faker $faker) {
    return [
        'nom_empresa' => $faker->name,
    	'direccion' => $faker->address,
    ];
});
