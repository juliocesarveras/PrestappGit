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
				{!! Form::open(array('route'=>'clientes.store')) !!}  
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
						<select class="custom-select form-control"  id="nacionalidad" name="nacionalidad" >
							@foreach($nacionalidad as $nac)
							<option selected value="{{ $nac->id }}">{{ $nac->descripcion }}</option>
							@endforeach
						</select>
					</div>

				</div>

				<div class="card-body">
					<h5 class="card-title">Dirección</h5>

					<div class="form-row"><!--Direccione-->

						<div class="col-md-6 mb-3">
							{{ form::label('calle','calle',array('class' => 'awesome'))}}
							{{ form::text('calle',null,['class'=>'form-control','id'=>'validationDefault03', 'placeholder'=>'ej. calle primera']) }}
							<div class="invalid-feedback">
								Please provide a valid city.
							</div>
						</div>

						<div class="col-md-3 mb-3">
							{{ form::label('numero','Número de casa',array('class' => 'awesome'))}}
							{{ form::text('numero',null,['class'=>'form-control','id'=>'validationDefault04', 'placeholder'=>'ej. 9']) }}

							<div class="invalid-feedback">
								Please provide a valid state.
							</div>
						</div>

						<div class="col-md-3 mb-3">
							{{ form::label('sector','Sector',array('class' => 'awesome'))}}
							{{ form::text('sector',null,['class'=>'form-control','id'=>'validationDefault05','placeholder'=>'sector' ]) }}

						</div>

						<div class="col-md-3 mb-3">
							{{ form::label('ciudad','ciudad',array('class' => 'awesome'))}}
							{{form::select('id_ciudad',$ciudades,1,['class'=>'form-control'])}}						
						</div>

						<div class="col-md-3 mb-3">
							{{ form::label('pais','pais',array('class' => 'awesome'))}}
							<select class="custom-select form-control" id="id_pais" name="id_pais">
								@foreach($pais as $pai)
								<option selected value="{{ $pai->id }}">{{ $pai->descripcion }}</option>
								@endforeach
							</select>
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