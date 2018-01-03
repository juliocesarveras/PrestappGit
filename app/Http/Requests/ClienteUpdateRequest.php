<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClienteUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nombre' => 'required', 
            'apellido' => 'required', 
            'cedula' => 'required | unique:clientes,cedula->ignore($cliente->id)',
            'nacimiento' => 'required',
            'id_nacionalidad' => 'required',
            'email' => 'required | unique:clientes,email->ignore($cliente->id)',
            'telefono' => 'required',

            //validar campos direccion
            'direccion.calle'=>'required',
            'direccion.numero'=>'required',
            'direccion.sector'=>'required',
            'direccion.id_ciudad'=>'required',
            'direccion.id_pais'=>'required'
        ];
    }
}
