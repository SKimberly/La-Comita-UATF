<?php

use Illuminate\Database\Seeder;
use Lacomita\Models\Material;
use Lacomita\Models\Categoria;
use Lacomita\Models\Producto;
use Lacomita\Models\ProductoFoto;
use Lacomita\Models\Talla;

class ProductosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	/*factory(Categoria::class, 5)->create();
    	factory(Producto::class, 10)->create();
        factory(ProductoFoto::class, 20)->create();*/
    	factory(Material::class, 30)->create();

        $categoria = factory(Categoria::class, 5)->create();

        $categoria->each(function($cate){
            $productos = factory(Producto::class, 10)->create();
            $cate->productos()->saveMany($productos); //saveMany-->guardar de uno a muchos

            $productos->each(function($fot){
                $fotos = factory(ProductoFoto::class, 20)->create();
                $tallas = factory(Talla::class, 3)->create();
                $fot->fotos()->saveMany($fotos);
                $fot->tallas()->saveMany($tallas);
            });
        });
    }
}
