@extends('layout');

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
		<div class="card-header">Editar {{ $pais->descripcion }}</div>
		<div class="card-body">
		<!--Form Model biding-->
{{ Form::model($pais,array('route' =>['pais.update', $pais->id], 'method' => 'PUT')) }}
			<div class="form-group">
			    
        		{!! Form::text('descripcion',null, array('class' => 'form-control')) !!}
			  </div>
  			<button type="submit" class="btn btn-primary">Guardar</button>
{{ Form::close() }}
	</div>
</div>
@endsection 
