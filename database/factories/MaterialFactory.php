<?php

use Faker\Generator as Faker;
use Lacomita\Material;

$factory->define(Material::class, function (Faker $faker) {
    return [
        'nombre' => $faker->word
    ];
});
