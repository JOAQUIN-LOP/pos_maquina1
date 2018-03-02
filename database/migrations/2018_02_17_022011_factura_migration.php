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
            $table->increments('idFactura');
            $table->integer('num_factura')->unique();
            $table->integer('idEmpresa')->unsigned();
            $table->integer('idSucursal')->unsigned();
            $table->string('mes',12);
            $table->string('anio',10);
            $table->date('fecha');
            $table->dateTime('hora');
            $table->string('direccion',75);
            $table->decimal('total_factura',8,2);
            $table->boolean('estado')->default(true);

            //creando la relacion con la tabla empresa
            $table->foreign('idEmpresa')->references('idEmpresa')->on('empresa');


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
        Schema::dropIfExists('factura');
    }
}
