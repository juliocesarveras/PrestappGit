<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
    protected $table = 'pagos';
    protected $fillable = ['monto','capital','interes'];


    public function prestamo(){

    	return $this->belongsTo('App\Prestamo','id_prestamo');
    }
}
