<?php

use Faker\Generator as Faker;
use Lacomita\Models\Producto;
$factory->define(Producto::class, function (Faker $faker) {
    return [
    	'nombre' => substr($faker->sentence(3),0,-1),
    	'descripcion' => $faker->sentence(10),
    	'detallelargo' => $faker->text,
    	'precio' => $faker->randomFloat(0,5,150),
    	'categoria_id' => $faker->numberBetween(1,5)
    ];
});
