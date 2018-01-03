@extends('layout')

@section('content')

@if(Session::has('message'))
{{ session::get('message') }}
@endif

@if($errors->any())
	<ul>
	@foreach($errors->all() as $error)
		<li>{{ $error }}</li>
	@endforeach
	</ul>
@endif

<div class="row">
	<div class="col-sm-8">
		<div class="card">
			<div class="card-header">Ciudad</div>

			<div class="card-body">
				
				{{ Form::open(array('route'=>array('ciudad.store'))) }}

				<div class="form-group">
					{{ form::label('descripcion','Ciudad') }}
					{{ form::text('descripcion',null,['class'=>'form-control','placeholder'=>'escriba la ciudad']) }}

				</div>
				<div class="form-group">
					{{ form::label('id_pais','Seleccione un país') }}
					{{ form::select('id_pais',$paises,1,['class'=>'form-control']) }}
				</div>				
				<div class="form-group">

					{{ form::button('Guardar',['class'=>'btn btn-success','type'=>'submit']) }}
				</div>
				{{ Form::close() }}
			</div>
		</div>
	</div>
</div>

@endsection