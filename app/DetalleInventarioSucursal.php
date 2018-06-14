<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetalleInventarioSucursal extends Model
{
    //
    protected $table = 'detalle_inventario_sucursal';

    protected $primaryKey = 'id_detalle_inventario_sucursal';

    protected $fillable =  array('idInventarioSucursal','idProducto', 'mes', 'anio', 'fecha','cantidad_total', 'subtotal_inventario');

    protected $hidden = ['deleted_at', 'created_at', 'updated_at'];

    protected $dates =['deleted_at'];
}
