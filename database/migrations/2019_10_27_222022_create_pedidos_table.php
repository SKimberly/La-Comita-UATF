<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePedidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('carrito_id')->nullable();
            $table->unsignedInteger('cotizacion_id')->nullable();

            $table->unsignedInteger('anticipo')->default(0);
            $table->date('fecha_entrega')->nullable();
            $table->unsignedInteger('pago')->default(0);
            $table->string('observaciones')->default('Ninguno')->nullable();
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
        Schema::dropIfExists('pedidos');
    }
}
