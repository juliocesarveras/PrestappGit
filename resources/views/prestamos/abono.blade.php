@extends('layout')

@section('content')

@if($errors->any())
<ul class="alert alert-danger">
	@foreach($errors->all() as $error)
	<li>{{ $error }}</li>
	@endforeach
</ul>
@endif

<main class="pt-5 blog-header container" role="main"> 
	<div class="container"> 
		<div class="blog-title" >
			<h1>Crear abono para  para {{ $prestamo->nombre}} {{ $prestamo->id}} </h1>
		</div>
		<div class="row no-gutters" >
			<div class="row">
				<div class="col-sm-12">
					<div class="card">
						<div class="card-header"> Abono </div>

						<div class="card-body">

							{{ Form::open(array('route'=>array('abono.store'))) }}
							{{ Form::hidden('id', $prestamo->id) }}

							<div class="form-row">

								<div class="col-md-12 mb-3">
									{{ form::label('Monto','Monto del abono') }}
									<div class="input-group mb-6">
										<div class="input-group-prepend">
											<span class="input-group-addon">$</span>
										</div>
										{{ form::text('monto',null,['class'=>'form-control','placeholder'=>'ej. 10000']) }}
									</div>
									<small id="emailHelp" class="form-text text-muted">escribir sin punos ni comas.</small>
								</div>
							</div>

							</div>
							<div class="card-body">

								<div class="form-group">
									{{ form::button('Guardar Abono',['class'=>'btn btn-primary','type'=>'submit']) }}
								</div>
							</div>

							{{ Form::close() }}

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>


@endsection