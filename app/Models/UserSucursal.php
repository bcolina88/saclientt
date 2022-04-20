<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class UserSucursal extends Model
{
    //

    protected $table = "users_sucursales";

    protected $fillable = [
      'sucursal_id' ,'user_id','created_at','updated_at'
    ];


    public function sucursal(){
    	return $this->belongsTo('App\Models\Sucursal', 'sucursal_id', 'id');
	}

	public function user(){
    	return $this->belongsTo('App\Models\User', 'user_id', 'id');
	}

}
