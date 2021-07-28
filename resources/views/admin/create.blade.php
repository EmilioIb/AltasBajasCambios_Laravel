@extends('layout.plantilla')
@section('content')

<div class="container col-md-8">
    <br>
    <h2>Alumnos</h2>
    <div class="card">
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($alumnos as $a)
                        <tr>
                            <td>{{$a->id}}</td>
                            <td>{{$a->name}}</td>
                            <td>{{$a->email}}</td>
                            <td>
                                <a href="{{route('admin.edit', $a->id)}}" class="btn btn-dark">Asignar</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@stop