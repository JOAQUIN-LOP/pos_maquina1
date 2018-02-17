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
            $table->float('cantidad',8,2);
            $table->string('descripcion',75);
            $table->float('precio_unit',8,2);
            $table->float('total_venta',8,2);

            $table->integer('producto_id')->unsigned();
            $table->integer('factura_num')->unsigned();

            //creando la relacion con la tabla producto
            $table->foreign('producto_id')
                ->references('idProducto')
                ->on('producto')
                ->onDelete('cascade');

            //creando la relacion con la tabla factura
            $table->foreign('factura_num')
                ->references('num_factura')
                ->on('factura')
                ->onDelete('cascade');

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
