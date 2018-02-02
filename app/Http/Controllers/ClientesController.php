<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;
Use App\Http\Requests\ClienteRequest;
use App\Http\Requests\ClienteUpdateRequest;
use App\Prestamo;
Use App\Nacionalidad;
use App\Pais;
use App\Ciudad;
use App\Direccion;
use Carbon\Carbon;

class ClientesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $cliente= Cliente::all();
       return view('Clientes.clientes')->withClientes($cliente);
   }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $nacionalidad = Nacionalidad::orderBy('id','Desc')->get();
        $pais = Pais::orderBy('id','desc')->get();
        $ciudades = Ciudad::pluck('descripcion','id');
        return view('Clientes.cliente_create')
        ->withNacionalidad($nacionalidad)
        ->withPais($pais)
        ->withCiudades($ciudades);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClienteRequest $request )
    {

    //Salvar direccion primero
        $dir = Direccion::create($request->all()); //save direccion

    //Salvar cliente
        $cliente = Cliente::create([
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'cedula' => $request->cedula,
            'id_direccion' => $dir->id,
            'nacimiento' => $request->nacimiento,
            'id_nacionalidad' => $request->nacionalidad,
            'telefono' => $request->telefono,
            'email' => $request->email
            ]);

        return redirect()->route('clientes.index')->withMessage('El cliente '.$cliente->nombre.' '.$cliente->apellido.' ha sido creado satisfacoriamente');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cliente = Cliente::findorFail($id);    
        $dt = Carbon::create($cliente->prestamo);//Date for payments
        $dt->ToDateString(); //convert the dateToDateString

        return view('clientes.cliente')->withCliente($cliente)->withDt($dt);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cliente = Cliente::findorFail($id);
        $paisesList = Pais::pluck('descripcion','id');//to the paises list
        $nacionalidadList = Nacionalidad::pluck('descripcion','id');
        $ciudades = Ciudad::pluck('descripcion','id');
        return view('clientes.cliente_edit')
        ->withCliente($cliente)
        ->withPaises($paisesList)
        ->withNacionalidad($nacionalidadList)
        ->withCiudades($ciudades);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ClienteUpdateRequest $request, CLiente $cliente)
    {
         $cliente->update($request->all());//update cliente
         $cliente->direccion->update($request->direccion); //update direccion
         return redirect()->route('clientes.index')
         ->withCliente($cliente)
         ->withMessage('El cliente '.$cliente->nombre.' '.$cliente->apellido.' se ha actualziado satsifactoriamente');  

     }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
