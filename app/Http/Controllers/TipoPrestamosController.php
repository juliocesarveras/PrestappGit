<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TipoPrestamo;

class TipoPrestamosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipoprestamo = TipoPrestamo::all();
        return view('admin.tipo_prestamo')->withTiposprestamos($tipoprestamo);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'descripcion'=>'required | unique:tipo_prestamos,descripcion'
            ]);

        TipoPrestamo::create($request->all());
        return back()->withMensaje('Se ha creado con éxito el tipo de préstamo');
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
        $tipoprestamo = TipoPrestamo::FindorFail($id);

        //dd($tipoprestamo);
        return view('admin.tipo_prestamo_edit')->withTiposprestamos($tipoprestamo);
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
        $tipoprestamo = TipoPrestamo::find($id);
        $tipoprestamo->update($request->all());
        return redirect()->route('tipoPrestamo.index')->withMensaje('El tipo de prestamo ha sido actualizado correctamente');


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
