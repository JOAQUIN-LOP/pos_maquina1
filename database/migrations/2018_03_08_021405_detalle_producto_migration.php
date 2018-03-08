<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DetalleProductoMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_producto', function (Blueprint $table) {
            $table->increments('id_detalle_producto');
            $table->integer('idProducto')->unsigned();
            $table->integer('mes');
            $table->integer('anio');
            $table->date('fecha');
            $table->decimal('precio_total_compras',11,2);
            $table->decimal('cantidad_unidades',8,2);
            $table->decimal('precio_unidad',11,2);
            $table->boolean('estado')->default(true);


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
        Schema::dropIfExists('detalle_producto');
    }
}
