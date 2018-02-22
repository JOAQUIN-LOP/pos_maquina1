<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
//use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Usuario extends Authenticatable
{
    //use SoftDeletes;
    protected $table = 'usuario';

    protected $fillable = array('nom_usuario','apellidos', 'user','password','ACTIVO','empresa_id');                                                                          

    protected $hidden = ['created_at','updated_at','password','remember_token'];

    //protected $dates = ['deleted_at'];
}
