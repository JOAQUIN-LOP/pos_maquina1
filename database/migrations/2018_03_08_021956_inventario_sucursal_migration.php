<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InventarioSucursalMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventario_sucursal', function (Blueprint $table) {
            $table->increments('idInventarioSucursal');
            $table->integer('num_inventario_sucursal');     
            $table->integer('idSucursal')->unsigned();
            $table->integer('mes');
            $table->integer('anio');
            $table->date('fecha');
            $table->decimal('total_cantidad_productos',8,2);
            $table->decimal('total_cantidad_inventario',11,2);
            $table->boolean('estado')->default(true);


            //creando la relacion con la tabla sucursal
            $table->foreign('idSucursal')->references('idSucursal')->on('sucursal');

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
        Schema::dropIfExists('inventario_sucursal');
    }
}
