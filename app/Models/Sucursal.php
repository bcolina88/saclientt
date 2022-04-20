<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sucursal extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    

    protected $table = "sucursales";
     
    protected $fillable = [
        'telefono','email','direccion','rif','descripcion' ,'codigo','created_at','updated_at'
    ];

  
    
}
