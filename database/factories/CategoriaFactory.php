<?php

use Faker\Generator as Faker;
use Lacomita\Models\Categoria;

$factory->define(Categoria::class, function (Faker $faker) {
    return [
        'nombre' => ucfirst($faker->word),
        'descripcion' => ucfirst($faker->sentence(10)),
        'imagen' => $faker->imageUrl(250,250)
    ];
});
