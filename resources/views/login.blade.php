@extends('layout.plantilla')
@section('content')



<div class="container col-md-5">
<h1>Login</h1>
<form method="post" action="/validacion">
    @csrf
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" name="email" id="email" class="form-control">
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Contraseña</label>
        <input type="password" name="password" id="password" class="form-control">
    </div>
        <input type="submit" value="Enviar" class="btn btn-primary">
</form>
</div>

@stop
