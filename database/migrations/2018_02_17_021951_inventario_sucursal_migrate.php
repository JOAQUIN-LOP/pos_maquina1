<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InventarioSucursalMigrate extends Migration
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
            $table->string('mes',12);
            $table->string('anio',10);
            $table->date('fecha');
            $table->decimal('total_cantidad_productos',8,2);
            $table->decimal('total_cantidad_inventario',8,2);
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
