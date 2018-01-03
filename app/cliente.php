<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;


class Cliente extends Model
{
    //

	protected $fillable = [

	'nombre', 'apellido', 'cedula','nacimiento','id_direccion','id_nacionalidad','email','telefono'
	
	];

	public static function activos()
	
	{

		//return static::where('activo', 1)->get();


	}

	
// DEFINE RELATIONSHIPS --------------------------------------------------
    // each cliente belongsTo one direccion 
    public function direccion() {
        return $this->belongsTo('App\Direccion','id_direccion'); // this matches the Eloquent model and the second parameter is the foreing_key on the $cliente table
    }

    // 
    public function nacionalidad() {
        return $this->belongsTo('App\Nacionalidad','id_nacionalidad');
    }

public function prestamos(){
	return $this->hasMany('App\Prestamo',"id_cliente");
}


public function getEdadAttribute(){

		return $this->nacimiento = Carbon::createFromFormat('Y-m-d',$this->nacimiento)->diff(Carbon::now())->format('%y años');

	}

	//scope queries

	/* public static function scopeactivos($query)

	{
	
		return $query->where('activo',1);



	}

	*/

}
