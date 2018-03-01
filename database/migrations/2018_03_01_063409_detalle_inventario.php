<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DetalleInventario extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_inventario', function (Blueprint $table) {
            $table->increments('id_detalle_inventario');
            $table->integer('inventario_numero')->unsigned();
            $table->integer('id_calculo')->unsigned();
            $table->float('cantidad_total',8,2);
            $table->float('total_inventario',8,2);
            $table->date('fecha');


             //creando la relacion con la tabla inventario sucursal
            $table->foreign('inventario_numero')->references('num_inventario')->on('inventario')->onDelete('cascade');
            //creando la relacion con la tabla inventario sucursal
            $table->foreign('id_calculo')->references('id_tabla_calculo')->on('tabla_calculo')->onDelete('cascade');
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
        Schema::dropIfExists('detalle_inventario');
    }
}
