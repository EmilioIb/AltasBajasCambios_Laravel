@extends('layout.plantilla')
@section('content')

<h1>Bienvenido</h1>

<div class="container col-md-5">
    <br>
    <h3>Alumno: {{$user->name}}</h3>
    <table class="table table-striped table-hover">
        <tr>
            <th>Materia</th>
            <th>Cuatri</th>
        </tr>
    @foreach ($materias as $m)
        <tr>
            <td>{{$m->materia}}</td>
            <td>{{$m->cuatri}}</td>
        </tr>
    @endforeach
    
    </table>
</div>


@stop