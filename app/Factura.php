<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquen\SofttDeletes;

class Factura extends Model
{
	use SoftDeletes;

	protected $table = 'factura';

	protected $fillable = array('num_factura','idEmpresa', 'idSucursal','idUsuario', 'dia', 'mes', 'anio', 'fecha','hora', 'direccion','total_factura','estado');

    protected $hidden = ['deleted_at', 'created_at','updated_at'];

    protected $dates = ['deleted_at'];
}
