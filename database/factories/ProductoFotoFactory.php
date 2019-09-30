<?php

use Faker\Generator as Faker;
use Lacomita\Models\ProductoFoto;
$factory->define(ProductoFoto::class, function (Faker $faker) {
    return [
    	'imagen' => $faker->imageUrl(250,250),
    	'producto_id' =>$faker->numberBetween(1,10)
    ];
});
