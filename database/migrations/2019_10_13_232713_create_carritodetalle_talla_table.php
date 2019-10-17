<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarritodetalleTallaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carrito_detalle_talla', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('carrito_detalle_id');
            $table->unsignedInteger('talla_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('carritodetalle_talla');
    }
}
