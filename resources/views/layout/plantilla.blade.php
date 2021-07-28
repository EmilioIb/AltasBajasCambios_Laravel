<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
      .botonin{
        background-color: #aeaeaf;
        padding: 10px 0px;
        width: 100%;
      }
      a:link.botonin, a:visited.botonin{
        color: black;
        text-decoration: none;
      }
      a:hover.botonin, a:active.botonin{
        color: #f8f9fa;
      }
      .fixed{
        position: fixed;
        bottom: 0;
      }
    </style>
    <title>Hello, world!</title>
  </head>
  <body>
    @section('header')
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="{{route('index')}}">Index</a>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            @guest
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="{{route('login')}}">Login</a>
            </li>
            @else

            {{-- Modificacion  --}}
            
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                {{Auth::user()->name}}
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="{{route('menulog')}}">Materias</a></li>
               <!-- <li><hr class="dropdown-divider"></li> -->
              </ul>
            </li>

            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Admin: {{Auth::user()->name}}
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="{{route('admin.index')}}">Registro</a></li>
                <li><a class="dropdown-item" href="{{route('admin.create')}}">Asignar Materias</a></li>
                <li><a class="dropdown-item" href="{{route('hola')}}">Alumnos</a></li>
                <li><a class="dropdown-item" href="{{route('materias')}}">Materias</a></li>
              </ul>
            </li>

            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
               Profesores: {{Auth::user()->name}}
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="{{route('docente.index')}}">Asignar Materias a impartir</a></li>
                <li><a class="dropdown-item" href="">Calificar</a></li>
                <li><a class="dropdown-item" href="">Materias</a></li>
              </ul>
            </li>

  
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="{{route('logout')}}">Salir</a>
            </li>
            @endguest
          </ul>
        </div>
      </div>
    </nav>
    @show

    <div class="row">
      @section('content')


      @show
    </div>
    

      @section('footer')
      <br>
      <p><a href="{{route('index')}}">Index</a></p>
      </div>
      @show




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


  </body>
</html>