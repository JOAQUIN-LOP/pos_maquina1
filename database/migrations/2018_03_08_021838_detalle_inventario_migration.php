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
            $table->integer('idProducto')->unsigned();
            $table->integer('mes');
            $table->integer('anio');
            $table->date('fecha');
            $table->decimal('cant_total',8,2);
            $table->decimal('subtotal_inventario',11,2);


             //creando la relacion con la tabla inventario sucursal
            $table->foreign('idInventario')->references('idInventario')->on('inventario');
            
            //creando la relacion con la tabla inventario sucursal
            $table->foreign('idProducto')->references('idProducto')->on('producto');
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
