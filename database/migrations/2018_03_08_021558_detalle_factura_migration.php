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
            $table->integer('idFactura')->unsigned();
            $table->integer('idProducto')->unsigned();
            $table->decimal('cantidad',8,2);
            $table->decimal('precio_unit',11,2);
            $table->decimal('total_venta',11,2);

            //creando la relacion con la tabla factura
            $table->foreign('idFactura')->references('idFactura')->on('factura');

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
        Schema::dropIfExists('detalle_factura');
    }
}
