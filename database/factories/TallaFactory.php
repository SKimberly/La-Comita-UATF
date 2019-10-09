<?php

use Faker\Generator as Faker;
use Lacomita\Models\Talla;

$factory->define(Talla::class, function (Faker $faker) {
    return [
        'nombre' => $faker->word
    ];
});
