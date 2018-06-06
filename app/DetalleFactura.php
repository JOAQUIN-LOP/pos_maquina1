<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetalleFactura extends Model
{	

	protected $table = 'detalle_factura';

	protected $fillable = array('idFactura','idProducto', 'cantidad','precio_unit','total_venta');

	protected $hidden = ['deleted_at', 'created_at','updated_at'];

	protected $dates = ['deleted_at'];

}
