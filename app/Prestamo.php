<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prestamo extends Model
{
    protected $table = 'prestamos';
    protected $fillable = ['monto','porcentaje', 'tiempo','id_tipo','id_forma_pago','id_cliente'];

    
    public function  cliente(){

    	return $this->belongsTo('App\Cliente','id_cliente');

    }

public function FormaPago(){

	return $this->belongsTo('App\FormaPago','id_forma_pago');
}

public function TipoPrestamo(){

	return $this->belongsTo('App\TipoPrestamo','id_tipo');
} 

public function Pago(){
	return $this->hasMany('App\Pago','id_prestamo');
}
}

