<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    

    protected $table = "clientes";
     
    protected $fillable = [
       'nombre','telefono','email','direccion','rif','descripcion' ,'codigo','created_at','updated_at'
    ];

  
    
}
