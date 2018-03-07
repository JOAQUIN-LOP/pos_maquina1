<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DetalleInventarioSucursalMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_inventario_sucursal', function (Blueprint $table) {
            $table->increments('id_detalle_inventario_sucursal');
            $table->integer('idInventarioSucursal')->unsigned();
            $table->integer('idProducto')->unsigned();
            $table->integer('mes',2);            
            $table->integer('anio',4);
            $table->date('fecha');
            $table->decimal('cantidad_total',8,2);
            $table->decimal('subtotal_inventario',11,2);


             //creando la relacion con la tabla inventario sucursal
            $table->foreign('idInventarioSucursal')->references('idInventarioSucursal')->on('inventario_sucursal');
            //creando la relacion con la tabla calculo sucursal
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
        Schema::dropIfExists('detalle_inventario_sucursal');
    }
}
