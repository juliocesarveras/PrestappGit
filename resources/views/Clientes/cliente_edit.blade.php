@extends('layout')

@section('content')

@if($errors->any())
<div class="alert alert-danger form-control">
	@foreach($errors->all() as $error)
	<ul>
		<li>{{ $error }}</li>
	</ul>
	@endforeach
</div>
@endif

<div class="row">
	<div class="col-m8 col-s12">	
		<div class="card">
			<div class="card-header">
				Crear Cliente
			</div>
			<div class="card-body">
				<h5 class="card-title">Datos personales</h5>
				{!! Form::model($cliente,array('route'=>['clientes.update', $cliente->id],'method'=>'PUT')) !!}  
				<div class="form-row">

					<div class="col-md-6 mb-3">
						{{ form::label('nombre', 'Nombre del Cliente', array('class' => 'awesome'))}}
						{{ Form::text('nombre',null,['class'=>'form-control','placeholder'=>'Nombre del cliente','required']) }}
					</div>

					<div class="col-md-6 mb-3">
						{{ form::label('apellido', 'Apellido del Cliente', array('class' => 'awesome'))}}
						{{ Form::text('apellido',null,['class'=>'form-control','placeholder'=>'Escriba el Apellido','required']) }}
					</div>
				</div>
				

				<div class="form-row">

					<div class="col-md-6 mb-3">
						{{ form::label('cedula', 'Cédula del Cliente', array('class' => 'awesome'))}}
						{{ Form::text('cedula',null,['class'=>'form-control','placeholder'=>'Escriba la cédula','required']) }}
					</div>
					<div class="col-md-6 mb-3">
						{{ form::label('nacimiento', 'Fecha de nacimiento', array('class' => 'awesome'))}}
						{{ Form::text('nacimiento',null,['class'=>'form-control','placeholder'=>'Escriba la fecha de nacimiento']) }}
					</div>

					<div class="col-md-6 mb-3">
						{{ form::label('telefono','Número de teléfono',array('class' => 'awesome'))}}
						{{ form::text('telefono',null,['class'=>'form-control','placeholder'=>'Escriba el telefono','required']) }}

					</div>

					<div class="col-md-6 mb-3">
						{{ form::label('email','Correo electónico',array('class' => 'awesome'))}}
						{{ form::email('email',null,['class'=>'form-control','placeholder'=>'Escriba el correo electrónico']) }}

					</div>

					<div class="col-md-6 mb-3">
						{{ form::label('nacionalidad','Nacionalidad',array('class'=>'awesome')) }}
						{{ form::select('id_nacionalidad',$nacionalidad,$cliente->id_nacionalidad,['class'=>'form-control']) }}
					</div>

				</div>

				<div class="card-body">
					<h5 class="card-title">Dirección</h5>

					<div class="form-row"><!--Direccione-->

						<div class="col-md-6 mb-3">
							{{ form::label('calle','calle',array('class' => 'awesome'))}}
							{{ form::text('direccion[calle]',null,['class'=>'form-control','id'=>'validationDefault03', 'placeholder'=>'ej. calle primera']) }}
							<div class="invalid-feedback">
								Please provide a valid city.
							</div>
						</div>

						<div class="col-md-3 mb-3">
							{{ form::label('numero','Número de casa',array('class' => 'awesome'))}}
							{{ form::text('direccion[numero]',null,['class'=>'form-control','id'=>'validationDefault04', 'placeholder'=>'ej. 9']) }}

							<div class="invalid-feedback">
								Please provide a valid state.
							</div>
						</div>

						<div class="col-md-3 mb-3">
							{{ form::label('sector','Sector',array('class' => 'awesome'))}}
							{{ form::text('direccion[sector]',null,['class'=>'form-control','id'=>'validationDefault05','placeholder'=>'sector' ]) }}

						</div>

						<div class="col-md-3 mb-3">
							{{ form::label('ciudad','ciudad',array('class' => 'awesome'))}}
							{{ form::select('direccion[id_ciudad]',$ciudades,$cliente->direccion->ciudad->id_ciudad,['class'=>'form-control'])}}						</div>

							<div class="col-md-3 mb-3">
								{{ form::label('pais','pais',array('class' => 'awesome'))}}
								
								{!!Form::select('direccion[id_pais]', $paises, $cliente->direccion->id_pais, ['class' => 'form-control'])!!}							
							</div>

						</div><!--.end formRowDireccion-->
					</div>
					{{ Form::button('Guardar',['class'=>'btn btn-success','type'=>'submit']) }}

					{{ Form::close() }}

				</div><!--.end CardBody-->
			</div><!--.end Card-->
		</div>
	</div>

	@endsection