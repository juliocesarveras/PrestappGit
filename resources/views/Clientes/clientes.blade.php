@extends ('layout')



@section ('content')


<main class="" role="main">
  @if(Session::has('message'))
  <div class="alert alert-success">   
    {{ Session::get('message') }}
  </div>
  @endif

  <h2>Clientes</h2>
  <div class="table-responsive">
    <table class="table table-striped">
      <thead>
        <tr>
          <th>#</th>
          <th>Nombre</th>
          <th>Apellido</th>
          <th>Cédula</th>
          <th>Nacimiento</th>
          <ht>Action</ht>
        </tr>
      </thead>
      <tbody>

        @foreach ($clientes as $cliente) 

        <tr> 	
          <td>{{ $cliente->id }}</td>
          <td><a href="{{ route('clientes.show',$cliente->id) }}">{{ $cliente->nombre }}</a></td>
          <td>{{ $cliente->apellido}}</td>
          <td>{{ $cliente->cedula }}</td>
          <td>{{ $cliente->nacimiento}}</td>
          <td> {{ link_to_route('clientes.edit','Editar',[$cliente->id],['class'=>'btn btn-success']) }}</td>
        </tr>

        @endforeach

      </tbody>
    </table>
  </div>
</main>


@endsection
