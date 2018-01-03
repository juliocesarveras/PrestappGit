@extends ('layout');

@section('content')

<!--alert message-->
@if(Session::has('message'))
	<div class="alert alert-danger">{{ Session::get('message') }}</div>
@endif
@if(Session::has('mensaje'))
	<div class="alert alert-success">{{ Session::get('mensaje') }}</div>
@endif

<!-- validation errors-->
<div class="col-sm-8">
	@if ($errors->any())
			    <div class="alert alert-danger">
			        <ul>
			            @foreach ($errors->all() as $error)
			                <li>{{ $error }}</li>
			            @endforeach
			        </ul>
			    </div>
			@endif 
</div><!--validation end-->


<div class="row">
<div class="col-sm-8">
	<div class=" card">
		<div class="card-header">Forma de pago</div>
		<div class="card-body">
{{ Form::open(array('route' => array('formaPago.store'))) }}
			<div class="form-group">
			    
{{  Form::text('descripcion',null,['class'=>'form-control','placeholder'=>'escriba una nacionalidad']) }}
			    
			  </div>
		{{   Form::submit('Guardar',['class'=>'btn btn-primary']) }}
{{ Form::close() }}
	</div>
</div>
<h1>Administrar Formas de Pagos</h1>
<div class="card">
	<div class="card-header">Forma de pago creadas</div>
	<div class="car-body">
			
				<table class="table">
					<tr>
						<th>Forma de pago</th>
						<th>Action</th>
					</tr>
					
					@foreach($formapagos as $formapago)
					<tr>
						<td>{{ $formapago->descripcion }} </td>
						<td>
							{{ Form::open(array('route'=>['nacionalidad.destroy',$formapago->id],'method'=>'DELETE')) }}

								{{ link_to_route('formaPago.edit','Editar',[$formapago->id],['class'=>'btn btn-primary']) }}
								

								{{ form::button('Borrar',['class'=>'btn btn-danger','type'=>'submit']) }}
							{{ Form::close() }}
						</td>
					</tr>
					@endforeach
				</table>			
		</div>
</div>
</div>

@endsection 
