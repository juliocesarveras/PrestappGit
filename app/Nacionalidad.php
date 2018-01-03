<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nacionalidad extends Model
{

	protected $table = 'nacionalidades';

	protected $fillable =['descripcion'];

	public function cliente(){

		return $this->hasOne('App\Cliente','id_nacionalidad');
	}

	

}



