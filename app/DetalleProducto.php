<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetalleProducto extends Model
{
    protected $table = 'detalle_producto';

    public function producto(){
        return $this->hasOne('App\producto','id','idProducto');
    }

}
