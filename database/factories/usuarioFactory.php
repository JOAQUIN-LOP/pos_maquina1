<?php

use Faker\Generator as Faker;

$factory->define(App\usuario::class, function (Faker $faker) {
    return [
        'nom_usuario' => $faker->name,
    	'apellidos' => $faker->lastName,
    	'user' => $faker->userName,
    	'password' => $faker->password,
    ];
});
