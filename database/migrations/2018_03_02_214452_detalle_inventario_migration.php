<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DetalleInventarioMigration extends Migration
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
            $table->integer('idInventario')->unsigned();
            $table->integer('idCalculoInventario')->unsigned();
            $table->decimal('cantidad_total',8,2);
            $table->decimal('total_inventario',8,2);
            $table->date('fecha');


             //creando la relacion con la tabla inventario sucursal
            $table->foreign('idInventario')->references('idInventario')->on('inventario');
            
            //creando la relacion con la tabla inventario sucursal
            $table->foreign('idCalculoInventario')->references('idCalculoInventario')->on('calculo_inventario');
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
