<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ciudad extends Model
{
	protected $table ="ciudades";

	protected $fillable = ['descripcion','id_pais'];

	public function pais(){

		return $this->belongsTo('App\Pais','id_pais');
	}


}
