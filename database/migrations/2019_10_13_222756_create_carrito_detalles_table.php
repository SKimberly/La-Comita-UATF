<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarritoDetallesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carrito_detalles', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('carrito_id')->unsigned();
            $table->foreign('carrito_id')->references('id')->on('carritos');

            $table->integer('producto_id')->unsigned();
            $table->foreign('producto_id')->references('id')->on('productos');

            $table->integer('cantidad');
            $table->text('descripcion')->nullable();
            $table->integer('descuento')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('carrito_detalles');
    }
}
