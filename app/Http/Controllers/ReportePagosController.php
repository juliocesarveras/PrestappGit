<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Prestamo;
use Carbon\Carbon;

class ReportePagosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $prestamo = Prestamo::findorFail($id);


        $calculos = [

            'loop' => $prestamo->tiempo*4,
            'porcentaje' => $prestamo->porcentaje/100,
            'interes' => $prestamo->monto*($prestamo->porcentaje/100)*$prestamo->tiempo,
            'redito'=> ($prestamo->monto*($prestamo->porcentaje/100)*$prestamo->tiempo)/($prestamo->tiempo*4),
            'capital'=>$prestamo->monto/($prestamo->tiempo*4),
            'fechaorigin' => Carbon::parse($prestamo->created_at)->format('d-M-Y'),
            'pago'=>$prestamo->monto,
            'prestamo'=>$prestamo->tiempo,
            'fechacuotas'=>$prestamo->created_at,
            'capitalpendiente'=>$prestamo->monto
        ];


        
//dd($calculos);

        return view('prestamos.reporte_show')->withPrestamo($prestamo)->withCalculo($calculos);
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
