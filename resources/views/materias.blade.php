@extends('layout.plantilla')

@section('content')

<div class="container col-md-5">
    <br>
    <table class="table table-striped table-hover">
        <thead>
            <th>Materia</th>
            <th>Cuatri</th>
        </thead>
    @foreach ($materias as $materia)
        <tr>
            <td>{{$materia->materia}}</td>
            <td>{{$materia->cuatri}}</td>
        </tr>
    @endforeach
    
    </table>
</div>


@stop