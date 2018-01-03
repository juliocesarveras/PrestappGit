<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClienteRequest extends FormRequest
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
            'nacionalidad' => 'required',
            'email' => 'required | unique:clientes,email->ignore($cliente->id)',
            'telefono' => 'required',

         //validar campos direccion
            'calle'=>'required',
            'numero'=>'required',
            'sector'=>'required',
            'id_ciudad'=>'required',
            'id_pais'=>'required'

        ];
    }
}
