@extends ('layout')

@section ('content')

<main class="pt-5 blog-header " role="main"> 

	@if(Session::has('message'))
	<div class="alert alert-success">{{ Session::get('message') }}</div>
	@endif
	<div class="blog-title" ></div>
	<div class="row" >	
		
		<div class="col-md-8">
			<!--tabla de reporte de pagos-->
			<div class="card ">
				<div class="card-header">Detalles de Pagos para el prestamo Numero {{ sprintf('%04d',$prestamo->id) }} de {{ $prestamo->cliente->nombre }} {{ $prestamo->cliente->apellido }}</div>
				<div class="card-body">
					<div class="table-responsive">
						<table class="table table-striped table-hover">
							<thead>
								<tr>
									<th>No.</th>
									<th>Cuota</th>
									<th>Capital</th>
									<th>Interés</th>
									<th>Capital Pendiente</th>
									<th>Fecha de pago</th>
									<th>estado</th>
								</tr>
							</thead>
							<tbody>
								@for($i=0;$i<$calculo['loop'];$i++)
								{{Form::model($prestamo->id,array('route'=>['pago.store', $prestamo->cliente->id],'method'=>'POST'))}}
								{{ Form::hidden('id', $prestamo->id) }}
								<tr>
									<td>{{$i+1}}</td>
									<td>${{ number_format ($calculo['cuota'],2, '.', ',') }}
										{{ Form::hidden('cuota', $calculo['cuota']) }}</td>
										<td>${{ number_format($calculo['capital'],2, '.', ',') }}
											{{ Form::hidden('capital', $calculo['capital']) }}</td>
											<td>${{ number_format($calculo['redito'],2,'.',',') }}
												{{ Form::hidden('interes', $calculo['redito']) }}</td>
												<td>${{ number_format($calculo['capitalpendiente']= $calculo['capitalpendiente']  - $calculo['capital']),2,'.',','  }}</td>
												@if($prestamo->id_forma_pago==1) 
												<td>{{ Carbon\Carbon::parse($calculo['fechacuotas']->addWeeks(1))->format('d-M-y')}}</td>
												@endif
												@if($prestamo->id_forma_pago==2)
												<td>{{ Carbon\Carbon::parse($calculo['fechacuotas']->addWeeks(2))->format('d-M-y')}}</td>
												@endif
												@if($prestamo->id_forma_pago==3)
												<td>{{ Carbon\Carbon::parse($calculo['fechacuotas']->addMonths(1))->format('d-M-y')}}</td>
												@endif
												<td>Pendiente</td>
												<td>{{Form::button('Pagar',['class'=>'btn btn-success','type'=>'submit'])}} </td>
											</tr>
											{{Form::close()}}
											@endFor
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="card ">
							<div class="card-header">Datos del Préstamo</div>
							<div class="card-body">
								<div class="table-responsive">
									<table class="table table-striped ">
										<tbody>
											<tr>
												<td><dt>Numero de Préstamo</dt></td>
												<td> {{ sprintf('%04d',$prestamo->id) }}</td>
											</tr>
											<tr>
												<td><dt>Tiempo Total</dt></td>
												<td> {{ $prestamo->tiempo }} meses</td>
											</tr>
											<tr>
												<td><dt>Tipo de Préstamo :</dt></td> 
												<td>{{ $prestamo->tipoPrestamo->descripcion }}</td>
											</tr>
											<tr>
												<td><dt>Cantidad de Pagos</dt></td>
												<td>{{$calculo['loop']}} cuotas</td>
											</tr>
											<tr>
												<td><dt>Forma de Pago</dt></td>
												<td>{{$prestamo->formaPago->descripcion}} </td>
											</tr>
											<tr>
												<td><dt>Tasa de Interés</dt></td>
												<td>{{$prestamo->porcentaje}} %</td>
											</tr>
											<tr>
												<td><dt>Interés a ganar en este préstamo</dt></td>
												<td>${{number_format($calculo['interes'],2, '.', ',') }}</td>
											</tr>

											<tr>
												<td><dt>Total de Cuotas pagadas a este prestamo</dt></td>
												<td>{{ $prestamo->pago->count() }}</td>
											</tr>
											
											<tr>
												<td><dt>Total Capital Pagado a este préstamo</dt></td>
												<td>$ {{ number_format($prestamo->pago->sum('capital'),2,'.',',') }}</td>
											</tr>

											<tr>
												<td><dt>Total Interes Pagado a este préstamo</dt></td>
												<td>$ {{ number_format($prestamo->pago->sum('interes'),2,'.',',') }}</td>
											</tr>
											<tr>
												<td><dt>Fecha Original:</dt></td>
												<td>{{ $calculo['fechaorigin'] }}</td>
											</tr>
											
											<tr>
												<td><dt>Monto Original :</dt></td> 
												<td>${{ number_format($prestamo->monto,2, '.', ',') }}</td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>

			</main>


			@endsection