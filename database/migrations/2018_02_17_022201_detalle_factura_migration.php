<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DetalleFacturaMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_factura', function (Blueprint $table) {
            $table->increments('idDetalle');
            $table->integer('num_factura')->unsigned();
            $table->float('cantidad',8,2);
            $table->integer('idProducto')->unsigned();
            $table->string('descripcion',75);
            $table->float('precio_unit',8,2);
            $table->float('total_venta',8,2);

            //creando la relacion con la tabla factura
            $table->foreign('num_factura')->references('num_factura')->on('factura')->onDelete('cascade');

            //creando la relacion con la tabla producto
            $table->foreign('idProducto')->references('idProducto')->on('producto')->onDelete('cascade');

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
        Schema::dropIfExists('detalle_factura');
    }
}
