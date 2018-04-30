<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inventario extends Model
{
    protected $table = 'inventario';

    public function empresa(){
        return $this->hasOne('App\Empresa','idEmpresa','idEmpresa');
    }


}
