<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FacturaMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('factura', function (Blueprint $table) {
            $table->increments('num_factura');
            $table->integer('empresa_id')->unsigned();
            $table->integer('sucursal_id')->unsigned();
            $table->string('mes',12);
            $table->string('anio',10);
            $table->date('fecha');
            $table->dateTime('hora');
            $table->string('direccion',75);
            $table->float('total_factura',8,2);
            $table->boolean('estado')->default(true);

            //creando la relacion con la tabla empresa
            $table->foreign('empresa_id')->references('idEmpresa')->on('empresa')->onDelete('cascade');


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
        Schema::dropIfExists('factura');
    }
}
