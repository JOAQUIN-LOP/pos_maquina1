<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TablaCalculo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tabla_calculo', function (Blueprint $table) {
            $table->increments('id_tabla_calculo');
            $table->integer('idProducto')->unsigned();
            $table->float('cantidad_bodega',8,2);
            $table->string('descripcion_producto',75);
            $table->float('precio_unitario',8,2);
            $table->float('subtotal',8,2);
            $table->date('fecha_transaccion');

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
        Schema::dropIfExists('tabla_calculo');
    }
}
