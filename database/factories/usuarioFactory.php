<?php

use App\usuario;
use Faker\Generator;

$factory->define(usuario::class, function (Generator $faker) {
    $array = [
        'nom_usuario' => $faker->name,
    	'apellidos' => $faker->lastName,
    	'user' => $faker->userName,
    	'password' => $faker->password
    ];
    return $array;
});
