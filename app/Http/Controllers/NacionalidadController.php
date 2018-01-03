<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Nacionalidad;
use App\Http\Requests\NacionalidadRequest;

class NacionalidadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nacionalidades = Nacionalidad::all();
        return view('admin.nacionalidad')->withNacionalidades($nacionalidades);   
       // return view('admin.nacionalidad', ['nacionalidades'=>$nacionalidades]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $nacionalidades = Nacionalidad::all();

        return view('admin.nacionalidad');


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NacionalidadRequest $request)
    {
        
        //Validation through Http\Requests\NacionalidadRequest

        Nacionalidad::create($request->all());

        return back()->withMensaje('La nacionalidad '.$request->descripcion.' ha sido añadida exitosamente');
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
    public function edit(Nacionalidad $nacionalidad)
    {
        //$nac = Nacionalidad::FindorFail($id);
        //we use what calls 'implicit route biding' just put our Model name and pass the object that comes from the edit page.
        return view('admin.nacionalidad_edit')->withNacionalidad($nacionalidad);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(NacionalidadRequest $request, Nacionalidad $nacionalidad)
    {
        
        //$nac = Nacionalidad::find($id);
        //$nac->descripcion = $request->descripcion;
        //$nac->save();
        
        //Nacionalidad::where('id',$id)->update($request->all());

        $nacionalidad->update($request->all()); //implicit route model:: modelbinding

        return redirect()->route('nacionalidad.index')->withMensaje('La nacionalidad '.$request->descripcion.' ha sido actualizada');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Nacionalidad $nacionalidad)
    {
        //Nacionalidad::destroy($id);
     
        $nacionalidad->delete(); //pasar como parmetro el modelo y el objeto
        return back()->with('message','La nacionalidad fue borrada exitosamente');

    }
}
