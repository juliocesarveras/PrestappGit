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
			<div class="card">
				<div class="card-header">Detalles de pagos para el préstamo Número {{ sprintf('%04d',$prestamo->id) }} de {{ $prestamo->cliente->nombre }} {{ $prestamo->cliente->apellido }}</div>				

				<div class="card text-center " style="background-color:#EBF0F3">
					<div class="card-body" >
						<div class="card-columns">
							<div class="card w-30">										
								<div class="card-body">
									<h5 class="card-title">{{$prestamo->pago->count()}}</h5>
									<small class="text-muted">Total de Pagos Realizados</small>
								</div>
							</div>


							<div class="card w-40">
								<div class="card-body">
									<h5 class="card-title">${{number_format($prestamo->pago->sum('capital')),',','.'}}</h5>
									<small class="text-muted">Capital Pagado</small>
								</div>
							</div>

							<div class="card w-40">
								<div class="card-body">
									<h5 class="card-title">${{number_format($prestamo->pago->sum('interes')),',','.'}}</h5>
									<small class="text-muted">Interés Pagado</small>
								</div>
							</div>

							<div class="card w-40">
								<div class="card-body">
									<h5 class="card-title">${{number_format($prestamo->pago->sum('monto')),',','.'}}</h5>
									<small class="text-muted">Total Pagado</small>
								</div>
							</div>

							<div class="card w-40">
								<div class="card-body">
									<h5 class="card-title">$  {{number_format(($calculo['capitalpendiente']) - ($prestamo->pago->sum('capital'))),',','.'}}</h5>
									<small class="text-muted">Capital Pendiente</small>
								</div>
							</div>
				@if($prestamo->id_tipo!=2) <!--si el tipo de préstamo es solo interés-->
		</div>
		@endif

@if($prestamo->id_tipo==2) <!--si el tipo de préstamo es solo interés-->

							<div class="card w-40">
								<div class="card-body">
									<h5 class="card-title">$  {{number_format(($prestamo->abono->sum('monto')) ),',','.'}}</h5>
									<small class="text-muted">Total de Abonos Realizados</small>
								</div>
							</div>
		</div>


						{{Form::model($prestamo->id,array('action'=>['AbonoController@show', $prestamo->id],'method'=>'POST'))}}
						{{ Form::hidden('id', $prestamo->id) }}

						{{Form::button('Abono a Capital',['class'=>'btn btn-success','type'=>'submit'])}}

						{{Form::close()}}

						@endif
					</div>
				</div>
			</div>


			@if ($calculo['loop'] - $prestamo->pago->count() > 0 ) <!--Si tiene cuotas pendientes-->
			<div class="card-body" >

				<div class="table-responsive">
					<div class="card-header">Detalles de cuotas pendientes</div>

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

							@for($i=0;$i<$calculo['loop'] - $prestamo->pago->count();$i++)
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
									</tbody><!--Fin del body de la table-->
								</table><!--Fin de la Tabla-->									
							</div><!--Fin del Div Table responsive-->								
						</div><!--Fin del CARD BODY-->
						@else <!--Si no tiene cuotas pendientes-->
						<h5 class="card-title">Este réstamo no tiene cuotas pendientes</h5>
						@endif <!--Fin del if-->
					</div>
					<div class="col-md-4">
						<div class="card card-outline-primary">
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
												<td><dt>Fecha Original:</dt></td>
												<td>{{ $calculo['fechaorigin'] }}</td>
											</tr>

											<tr>
												<td><dt>Monto Original :</dt></td> 
												<td>${{ number_format($prestamo->monto,2, '.', ',') }}</td>
											</tbody>
										</table>
									</div>
								</div>
								<div class="card-header card-outline-primary">Datos de Pagos</div>
								<div class="card-body">
									<div class="table-responsive">
										<table class="table table-striped ">
											<tbody>
												<tr>
													<td><dt>Total de Cuotas pagadas</dt></td>
													<td>{{ $prestamo->pago->count() }}</td>
												</tr>

												<tr>
													<td><dt>Total Capital Pagado</dt></td>
													<td>$ {{ number_format($prestamo->pago->sum('capital'),2,'.',',') }}</td>
												</tr>

												<tr>
													<td><dt>Total Interes Pagado </dt></td>
													<td>$ {{ number_format($prestamo->pago->sum('interes'),2,'.',',') }}</td>
												</tr>

											</tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div> <!--Fin del CARD-->

			</main>


			@endsection