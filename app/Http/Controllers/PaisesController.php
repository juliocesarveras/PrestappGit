<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pais;
use App\Http\Requests\PaisRequest;

class PaisesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pais= Pais::all();
        return view('admin.pais')->withPaises($pais);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pais');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PaisRequest $request)
    {
        //Validation trough Http\Requests\PaisRequest

        Pais::create($request->all());
        //redirect
        return back()->with('message','El país '.$request->descripcion.' fue creada exitosamente');
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
        $pais = Pais::FindorFail($id);

        //dd($pais);
        return view('admin.pais_edit')->withPais($pais);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PaisRequest $request, $id)
    {
        
        
        //$pais->descripcion = $request->descripcion;
        //$pais->save();
        //Pais::where('id',$id)->update($request->all());
        $pais = Pais::find($id);
        $pais->update($request->all());
        return redirect()->route('pais.index')->withMessage('El pais ha sido actualizado correctamente');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Pais::destroy($id);
        return redirect()->route('pais.index')->withMessage('El pais ha sido borrado correctamente');

    }
}
