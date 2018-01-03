@extends ('layout');

@section('content')

<!--Errors-->
<div class="col-sm-4">
	@if ($errors->any())
	<div class="alert alert-danger">
		<ul>
			@foreach ($errors->all() as $error)
			<li>{{ $error }}</li>
			@endforeach
		</ul>
	</div>
	@endif 
</div><!---.End errors-->

@if(Session::has('message'))
	<div class="alert alert-success">{{ Session::get('message') }}</div>


@endif

<div class="row">
	<div class="col-sm-8">
		<div class=" card">
			<div class="card-header">Pais</div>
			<div class="card-body">

				{{ Form::open(array('route'=>'pais.store')) }}
				<div class="form-group">
					{{ form::text('descripcion',null,['class'=>'form-control','placeholder'=>'Escriba un pais']) }}
				</div>
				<div class="form-group">
					{{ Form::button('Guardar',['class'=>'btn btn-primary','type'=>'submit']) }}
				</div>
				{{ Form::close() }}

			</div> <!--.end create form-->

			<div class=" card">
				<div class="card-header">Paises creados</div>
				<div class="card-body">

					<table class="table table-hover">

						<thead class="thead-dark">
							<tr>
								<th scope="col">#</th>
								<th scope="col">Pais</th>
								<th scope="col">Action</th>
							</tr>
						</thead>
						<tbody>

							@foreach($paises as $pais)
							<tr>
								<th scope="row">{{ $pais->id}}</th>
								<td>{{ $pais->descripcion }}</td>
								<td>
									{{ Form::open(array('route'=>['pais.destroy',$pais->id],'method'=>'DELETE')) }}


									{{ link_to_route('pais.edit', 'Editar', [$pais->id],['class'=>'btn btn-success']) }}
									

									{{ Form::button('Borrar',['class'=>'btn btn-danger','type'=>'submit']) }}

									{{ Form::close() }}

								</td>
								
							</tr>

							@endforeach
						</tbody>
					</table>
				</div>

			</div>
		</div>



		@endsection 