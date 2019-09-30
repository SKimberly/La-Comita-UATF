<?php

use Illuminate\Database\Seeder;
use Lacomita\Models\Categoria;
use Lacomita\Models\Producto;
use Lacomita\Models\ProductoFoto;

class ProductosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	factory(Categoria::class, 5)->create();
    	factory(Producto::class, 10)->create();
    	factory(ProductoFoto::class, 20)->create();
    }
}
