<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InventarioMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventario', function (Blueprint $table) {
            $table->increments('num_inventario');
            $table->integer('empresa_id')->unsigned();
            $table->string('mes',12);
            $table->string('anio',10);
            $table->date('fecha');
            $table->float('total_cantidad_productos',8,2);
            $table->float('total_cantidad_inventario',8,2);
            $table->boolean('estado')->default(true);


            //creando la relacion con la tabla empresa
            $table->foreign('empresa_id')->references('idEmpresa')->on('empresa')->onDelete('cascade');

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
        Schema::dropIfExists('inventario');
    }
}
