@extends ('layout')

@section ('content')

<main class="pt-5 blog-header container" role="main"> 
	<div class="container"> 

		<div class="blog-title" >
			<h1>{{ $cliente->nombre}} {{ $cliente -> apellido }}</h1>
		</div>

		<div class="row no-gutters " >	
			<div class="card-body">
				<div class="card-header">Prestamos de este cliente </div>

				<div class="table-responsive">
					<table class="table table-striped">
						<thead>
							<tr>
								<th>Monto</th>
								<th>tiempo</th>
								<th>fecha</th>
							</tr>
						</thead>
						<tbody>

							
							@foreach($cliente->prestamos as $cliente->prestamo)
							<tr>
								<td>$ {{ number_format($cliente->prestamo->monto,2, ',', '.') }}</td>
								<td>{{ $cliente->prestamo->tiempo }} meses</td>
								<td>{{ Carbon\Carbon::parse($cliente->prestamo->created_at)->format('d-M-y')  }}</td>
								<td> 
									{{  Carbon\Carbon::parse($dt->addWeeks(1))->format('d-M-y')}}</td>
							</tr>
							@endforeach
							<tr> 
								<td>Total</td>

								<td>
									@if(count($cliente->prestamo) )
									{{ $cliente->prestamo->sum('monto') }}
									@endif</td>
									<td></td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
				<div class="col-md-4">
					<div class="card ">

						<div class="card-header">Datos personales</div>
						<div class="card-body">
							<div class="table-responsive">
								<table class="table table-striped">
									<tbody>
										<tr> 	
											<td><dt>Mombre:</dt></td><td>{{ $cliente -> nombre }}</td>
										</tr>
										<tr>
											<td><dt>Apellido:</dt> </td><td><dd>{{ $cliente->apellido }}</dd></td>
										</tr>
										<tr>
											<td><dt>Edad: </dt> </td><td><dd>{{ $cliente->edad }}</dd></td>


										
										<tr>
											<td><dt>Cédula: </dt> </td><td><dd>{{ $cliente->cedula }}</dd></td>
										</tr>
										<tr>
											<td><dt>Nacionalidad:</dt></td> <td><dd>{{ $cliente->nacionalidad->descripcion }}</dd></td>
										</tr>




									</tbody>
								</table>
								<table class="table table-striped">
									<tbody>
										<tr> 	
											<td><dt>Dirección:</dt></td><td>{{ $cliente->direccion->calle }} {{  $cliente->direccion->numero}}, {{   $cliente->direccion->sector}},{{ $cliente->direccion->ciudad->descripcion }}, {{  $cliente->direccion->pais->descripcion }}</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
						<div class="card-body">
							{{ link_to_route('prestamo.create','Crear Prestamo',[$cliente->id],['class'=>'btn btn-primary']) }}
						</div>
					</div>
				</div>
			</div>
		</div>

	</main>


	@endsection