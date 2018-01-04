@extends ('layout')

@section ('content')

<main class="pt-5 blog-header container" role="main"> 
	<div class="container"> 

		<div class="blog-title" ></div>

		<div class="row no-gutters" >	
			<div class="col-md-5">
				<div class="card-body">
					<div class="card ">
						<div class="card-header">Datos del Préstamo</div>
						<div class="card-body">
							<div class="table-responsive">
								<table class="table table-striped">
									<tbody>
										
										<tr>
											<td><dt>Cantidad de Pagos</dt></td>
											<td>{{$calculo['loop']}} </td>
										</tr>
										

										<tr>
											<td><dt>Forma de Pago</dt></td>
											<td>{{$prestamo->formaPago->descripcion}} </td>
										</tr>
											<td><dt>Tasa de Interés</dt></td>
											<td>{{$prestamo->porcentaje}} %</td>
										</tr>
										<tr>
											<td><dt>Interés a ganar en este préstamo</dt></td>
											<td>{{number_format($calculo['interes'],2, '.', ',') }}</td>
										</tr>
										<tr>
											<td><dt>Fecha Original:</dt></td>
											<td>{{ $dt=$calculo['fechaorigin'] }}</td>
										</tr>
										<tr>
											<td><dt>Monto Original :</dt></td> 
											<td>$ {{ number_format($prestamo->monto,2, '.', ',') }}</td>
										</tr>

										<tr>
											
										
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--tabla de reporte de pagos-->
			<div class="card ">
				<div class="card-body">
					<div class="table-responsive">
						<table class="table table-striped">
							<thead>
								<tr>
									<th>No. Pago</th>
									<th>Capital</th>
									<th>Interés</th>
									<th>Cuota</th>
									<th>fecha de pago</th>
								</tr>
							</thead>
							<tbody>
								@for($i=0;$i<$calculo['loop'];$i++)
								<tr>
									<td>{{$i}}</td>
									<td>${{ number_format($prestamo->monto,2, ',', '.') }}</td>
									<td>${{ number_format($calculo['interes'],2,',','.') }}</td>
									<td>${{ number_format($prestamo->monto + $calculo['interes'],2, '.', ',') }}</td>
									<td>{{ Carbon\Carbon::parse($calculo['cuotas']->addWeeks(1))->format('d-M-y')}}</td>
								</tr>
								@endFor
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>

	</div>
</main>


@endsection