<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pais extends Model
{
        //protected $guarded = ['descripcion'];
    	protected $table = 'pais';

        protected $fillable = ['descripcion'];


public function direccion(){

	return $this->hasOne('App\Direccion');
}

public function ciudad(){

	return $this->hasOne('App\Ciudad');
}

}
