<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Abono extends Model
{
    protected $table = 'abonos';
    protected $fillable = ['id_prestamo','monto'];


	public function prestamo()
{
	return $this->belongsTo('App\Prestamo','id_prestamo');
}



}
