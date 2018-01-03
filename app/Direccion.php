<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Direccion extends Model
{
    protected $table ='direcciones';
    protected $fillable = [ 
    	'calle','numero','sector','id_ciudad','id_pais'
    ];

    public function pais(){
    	return $this->belongsTo('App\Pais','id_pais');
    }

    public function ciudad(){

    	return $this->belongsTo('App\Ciudad','id_ciudad');
    }
}
