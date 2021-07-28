@extends('layout.plantilla')
@section('content')

<div class="container col-md-8">
    <br>
    <h1>Asignacion de materias: {{$users->name}}</h1>
    <div class="card">
        <div class="card-body">
            <form action="" method="get">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Materia</th>
                            <th>Cuatrimestre</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($materias as $m)
                            <tr>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="{{$m->id}}" name="idMat[]" id="{{$m->materia}}">
                                        <label class="form-check-label" for="{{$m->materia}}">
                                        {{$m->materia}}
                                        </label>
                                    </div>
                                </td>
                                <td>{{$m->cuatri}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <button type="submit" class="btn btn-dark" value="si" name="guardar">Guardar</button>
            </form>
        </div>
    </div>

    <br>
    <h1>Materias actuales de: {{$users->name}}</h1>
    <div class="card">
        <div class="card-body">
            <form action="" method="get">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Materia</th>
                        <th>Cuatrimestre</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($profe as $p)
                        <tr>
                            <td>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="{{$p->id}}" name="idMat[]" id="{{$p->materia}}">
                                <label class="form-check-label" for="{{$p->materia}}">
                                  {{$p->materia}}
                                </label>
                              </div>
                            </td>
                            <td>{{$p->cuatri}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <button type="submit" class="btn btn-danger" value="si" name="eliminar">Eliminar</button>
            </form>
        </div>
    </div>


</div>

@stop