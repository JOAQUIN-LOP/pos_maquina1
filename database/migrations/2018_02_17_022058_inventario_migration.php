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
            $table->string('mes',12);
            $table->string('anio',10);
            $table->date('fecha');
            $table->float('cantidad',8,2);
            $table->string('descripcion_inventario',75);
            $table->float('precio_compra',8,2);
            $table->float('stock',8,2);
            $table->float('total_inventario',8,2);
            $table->boolean('estado')->default(true);


            $table->integer('empresa_id')->unsigned();

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
