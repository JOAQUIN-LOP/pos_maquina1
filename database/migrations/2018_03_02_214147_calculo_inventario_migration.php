<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CalculoInventarioMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('calculo_inventario', function (Blueprint $table) {
            $table->increments('idCalculoInventario');
            $table->integer('idProducto')->unsigned();
            $table->decimal('cantidad_bodega',8,2);
            $table->string('descripcion_producto',75);
            $table->decimal('precio_unitario',8,2);
            $table->decimal('subtotal',8,2);
            $table->date('fecha_transaccion');

                        //creando la relacion con la tabla producto
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
        Schema::dropIfExists('calculo_inventario');
    }
}
