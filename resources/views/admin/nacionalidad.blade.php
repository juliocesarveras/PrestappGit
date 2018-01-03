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
		<div class="card-header">Nacionalidad</div>
		<div class="card-body">
{{ Form::open(array('route' => array('nacionalidad.store'))) }}
			<div class="form-group">
			    
{{  Form::text('descripcion',null,['class'=>'form-control','placeholder'=>'escriba una nacionalidad']) }}
			    
			  </div>
		{{   Form::submit('Guardar',['class'=>'btn btn-primary']) }}
{{ Form::close() }}
	</div>
</div>
<h1>Administrar nacionalidades</h1>
<div class="card">
	<div class="card-header">Nacionalidades creadas</div>
	<div class="car-body">
			
				<table class="table">
					<tr>
						<th>nacionalidad </th>
						<th>Action</th>
					</tr>
					
					@foreach($nacionalidades as $nacional)
					<tr>
						<td>{{ $nacional->descripcion }} </td>
						<td>
							{{ Form::open(array('route'=>['nacionalidad.destroy',$nacional->id],'method'=>'DELETE')) }}

								{{ link_to_route('nacionalidad.edit','Editar',[$nacional->id],['class'=>'btn btn-primary']) }}
								

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
