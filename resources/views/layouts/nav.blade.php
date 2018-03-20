<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
  <a class="navbar-brand" href="#">Prestapp</a>
  <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarsExampleDefault">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="{{ url ('/') }}">Inicio <span class="sr-only">(current)</span></a>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Admin
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="{{ url ('pais') }}">Pais</a>
          <a class="dropdown-item" href="{{ route ('ciudad.index') }}">Ciudad</a>
          <a class="dropdown-item" href="{{ url ('nacionalidad') }}">nacionalidad</a>
          <a class="dropdown-item" href="{{ route ('formaPago.index') }}">Formas de Pagos</a>
          <a class="dropdown-item" href="{{ route ('tipoPrestamo.index') }}">Tipos de Préstamos</a>

        </div>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Clientes
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="{{ url ('clientes') }}">Lista de Clientes</a>
          <a class="dropdown-item" href="{{ route ('clientes.create') }}">Crear Clientes</a>

        </div>
      </li>


      <li class="nav-item">
        <a class="nav-link" href="#">Profile</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="#">Help</a>
      </li>
    </ul>
    
{{ Form::open(['method'=>'GET','url'=>'clientes','class'=>'navbar-form navbar-left','role'=>'search'])  }}

            <div class="input-group custom-search-form">
                <input type="text" class="form-control" name="search" placeholder="Search...">
                <span class="input-group-btn">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
{!! Form::close() !!}


  </div>
</nav>


