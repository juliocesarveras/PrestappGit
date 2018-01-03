<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoPrestamo extends Model
{
    protected $table = 'tipo_prestamos';

    protected $fillable = ['descripcion'];
}
