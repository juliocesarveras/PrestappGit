<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PrestamoRequest;
use App\Cliente;
use App\Prestamo;
use App\FormaPago;
use App\TipoPrestamo;

class PrestamosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        //dd($id);
        $cliente = Cliente::findOrFail($id);
        $formapagos = FormaPago::pluck('descripcion','id');
        $tipoprestamos = TipoPrestamo::pluck('descripcion','id');
        return view('prestamos.prestamo_create')
        ->withCliente($cliente)
        ->withFormapagos($formapagos)
        ->withTipoprestamo($tipoprestamos);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PrestamoRequest $request)
    {
        Prestamo::create($request->all());
        $cliente =$request->id_cliente;

        return redirect()->route('clientes.show',$request->id_cliente)->withMessage("El prestamo se ha creado satisfactoriamente");

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
