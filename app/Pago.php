<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
    protected $table = 'pagos';
    protected $fillable = ['id_prestamo','monto','capital','interes','pago_cuota_completa'];


    public function prestamo(){

    	return $this->belongsTo('App\Prestamo','id_prestamo');
    }
}
