<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUpdFacturaTrigger extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared(' 
            
            CREATE trigger upd_factura AFTER INSERT ON detalle_factura
            for each row 
                BEGIN
                    UPDATE factura SET total_factura = total_factura + NEW.total_venta
                    WHERE idFactura = NEW.idFactura;
                END
        ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP TRIGGER `upd_factura`');
    }
}
