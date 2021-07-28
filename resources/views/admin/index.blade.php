@extends('layout.plantilla')

@section('content')

<div class="container col-md-5">
    <br>

    @if ($registro ?? '' == "si")
    <div class="alert alert-success" role="alert">
        Usuario agregado correctamente
      </div>
    @endif

    <form method="post" action="{{route('admin.store')}}">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nombre</label>
            <input type="name" name="name" class="form-control" id="">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" class="form-control" id="">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Contraseña</label>
            <input type="password" name="password" class="form-control" id="">
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>

    </form>
</div>

@stop