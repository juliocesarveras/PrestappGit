@extends('layout')

@section('content')

@if($errors->any())
<ul class="alert alert-danger">
	@foreach($errors->all() as $error)
	<li>{{ $error }}</li>
	@endforeach
</ul>
@endif

<div class="row">
	<div class="col-sm-8">
		<div class="card">
			<div class="card-header"> Crear prestamo para {{ $cliente->nombre }}		</div>

			<div class="card-body">

				{{ Form::open(array('route'=>array('prestamo.store'))) }}
				{{ Form::hidden('id_cliente', $cliente->id) }}
				<div class="form-row ">

					<div class="col-md-4 mb-3">
						{{ form::label('Monto','Monto del préstamo') }}
						<div class="input-group mb-2">
							<div class="input-group-prepend">
								<span class="input-group-addon">$</span>
							</div>
							{{ form::text('monto',null,['class'=>'form-control','placeholder'=>'ej. 10000']) }}
						</div>
						<small id="emailHelp" class="form-text text-muted">escribir sin punos ni comas.</small>
					</div>

					<div class="col-md-4 mb-3">
						{{ form::label('porcentaje','Prociento de interés') }}
						<div class="input-group mb-2">
							{{ form::text('porcentaje',null,['class'=>'form-control','placeholder'=>'ej.: 5 ']) }}
							<div class="input-group-prepend">
								<span class="input-group-addon">%</span>
							</div>

						</div>
					</div>

					<div class="col-md-4 mb-3">
						{{ form::label('tiempo','Tiempo') }}
						<div class="input-group mb-2">
							{{ form::text('tiempo',null,['class'=>'form-control','placeholder'=>'ej.: 2']) }}
							<div class="input-group-prepend">
								<span class="input-group-addon">meses</span>
							</div>
						</div>
						<small id="emailHelp" class="form-text text-muted">expresar en meses</small>

					</div>

				</div>



				<div class="form-row ">

					<div class="col-md-4 mb-3">
						{{ form::label('forma_pago','Forma de pago') }}
						<div class="input-group mb-2">
							<div class="input-group-prepend">
								<span class="input-group-addon">
									<span class="glyphicon glyphicon-time" aria-hidden="true"></span>
									<i class="fa fa-clock-o fa-lg" aria-hidden="true"> </i>


								</span>
							</div>
							{{ form::select('id_forma_pago',$formapagos,1,['class'=>'form-control'])}}
						</div>
					</div>

					<div class="col-md-4 mb-3">
						{{ form::label('tipo_prestamo','Tipo de Préstamo') }}
						<div class="input-group mb-2">
							
							{{ form::select('id_tipo',$tipoprestamo,null,['class'=>'form-control']) }}

						</div>
					</div>

					

				</div>
				<div class="card-body">

					<div class="form-group">
						{{ form::button('Guardar Prestamo',['class'=>'btn btn-primary','type'=>'submit']) }}
					</div>
				</div>

				{{ Form::close() }}

			</div>
		</div>
	</div>
</div>


@endsection