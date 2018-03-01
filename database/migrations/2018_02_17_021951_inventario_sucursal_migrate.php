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
            $table->increments('num_inventario_sucursal');     
            $table->integer('sucursal_id')->unsigned();
            $table->string('mes',12);
            $table->string('anio',10);
            $table->date('fecha');
            $table->float('total_cantidad_productos',8,2);
            $table->float('total_cantidad_inventario',8,2);
            $table->boolean('estado')->default(true);


            //creando la relacion con la tabla sucursal
            $table->foreign('sucursal_id')->references('idSucursal')->on('sucursal')->onDelete('cascade');

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
