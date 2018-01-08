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

        $variables = [
        'porcentaje' => $prestamo->porcentaje/100,
        'interes' => $prestamo->monto*($prestamo->porcentaje/100)*$prestamo->tiempo,
        'fechaorigin' => Carbon::parse($prestamo->created_at)->format('d-M-Y'),
        'pago'=>$prestamo->monto,
        'prestamo'=>$prestamo->tiempo,
        'fechacuotas'=>$prestamo->created_at,
        'capitalpendiente'=>$prestamo->monto
        ];
        
        //si los pagos son semanales  id_forma_pago ==1 multiplica los meses por 4
        if($prestamo->id_forma_pago ==1){ $calculos=$this->calcula(4,$prestamo,$prestamo->id_tipo)+$variables;
        //Si son Los pagos son quincenales id_forma_pago ==2 multiplica los meses por 2
        }elseif($prestamo->id_forma_pago ==2){$calculos=$this->calcula(2,$prestamo,$prestamo->id_tipo)+$variables;
        //si los pagos son Mensuales id_forma_pago ==3 multiplica los meses por 1
        }elseif($prestamo->id_forma_pago ==3){$calculos=$this->calcula(1,$prestamo,$prestamo->id_tipo)+$variables;}

//dd($calculos);

        return view('prestamos.reporte_show')->withPrestamo($prestamo)->withCalculo($calculos);
    }



    public function calcula($factor, $prestamo,$tipoPrestamo){

       $comunes =[
       'loop' => $prestamo->tiempo*$factor,
       'redito'=> ($prestamo->monto*($prestamo->porcentaje/100)*$prestamo->tiempo)/($prestamo->tiempo*$factor),
       ];

            if($tipoPrestamo==1){//Si el tipo de prestamo es interés simple
                $calculos = [
                'capital'=>$prestamo->monto/($prestamo->tiempo*$factor),
                'cuota'=>($prestamo->monto/($prestamo->tiempo*$factor)) + ($prestamo->monto*($prestamo->porcentaje/100)*$prestamo->tiempo)/($prestamo->tiempo*$factor),            
                ];
            }elseif($tipoPrestamo==2){//si el tipo de préstamo es solo interés
                $calculos = [
                'capital'=>0,
                'cuota'=>($prestamo->monto*($prestamo->porcentaje/100)*$prestamo->tiempo)/($prestamo->tiempo*$factor),    
                ];
            }

            return $calculos+$comunes;
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
