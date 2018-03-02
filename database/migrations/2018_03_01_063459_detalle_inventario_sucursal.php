<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DetalleInventarioSucursal extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_inventario_sucursal', function (Blueprint $table) {
            $table->increments('id_detalle_inventario');
            $table->integer('num_inventario_sucursal')->unsigned();
            $table->integer('id_calculo_sucursal')->unsigned();
            $table->float('cantidad_total',8,2);
            $table->float('total_inventario',8,2);
            $table->date('fecha');


             //creando la relacion con la tabla inventario sucursal
            $table->foreign('num_inventario_sucursal')->references('num_inventario_sucursal')->on('inventario_sucursal');
            //creando la relacion con la tabla inventario sucursal
            $table->foreign('id_calculo_sucursal')->references('id_tabla_calculo_sucursal')->on('tabla_calculo_sucursal');
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
        Schema::dropIfExists('detalle_inventario_sucursal');
    }
}
