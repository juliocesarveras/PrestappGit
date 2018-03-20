<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\PagosRequest;
use App\Prestamo;
use App\Pago;

class PagosController extends Controller
{
    /**

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        dd('Hola create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       //dd('STORE');
       // dd($request->id);
       // Pago::create($request->all());
        $pago = Pago::create([
            'id_prestamo' => $request->id,
            'monto' => $request->cuota,
            'capital' => $request->capital,
            'interes' => $request->interes,
            'pago_cuota_completa'=>'1'

        ]); 
       // return view('prestamos.reporte_show');
        return redirect()->route('reportePago.show',$request->id)->withMessage("El pago se ha efectuado satisfactoriamente");

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
