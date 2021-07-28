@extends('layout.plantilla')
@section('content')

<div class="container col-md-5">
    <br>
    <h1>Asignar Materias</h1>

    <div class="card">
        <br>
        <form method="GET" action="">
            <div class="input-group mb-3">
                <label for="inputGroupSelector1" class="input-group-text">Cuatrimestre</label>
                <select class="form-select" name="cuatri" id="inputGroupSelector1">
                    <option selected value="0">Selecciona una opcion</option>
                    <option value="2">Segundo Cuatrimestre</option>
                    <option value="5">Quinto cuatrimestre</option>
                </select>
                <button type="submit" class="btn btn-dark">Buscar</button>
            </div>
        </form>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                <th>Cuatrimestre</th>
                <th>Nombre</th>
                </thead>
                <tbody>
                    @foreach($materias as $m)
                    <tr>
                        <td>{{$m->cuatri}}</td>
                        <td>{{$m->materia}}</td>
                    </tr>
                     @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <hr>

    <div class="card">
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                <th>Cuatrimestre</th>
                <th>Nombre</th>
                </thead>
                <tbody>
                    @foreach($matAsignadas as $m)
                    <tr>
                        <td>{{$m->cuatri}}</td>
                        <td>{{$m->materia}}</td>
                    </tr>
                     @endforeach
                </tbody>
            </table>

            <form method="get" action="">
                @if (isset($_GET['cuatri']))
                <input type="hidden" name="cuatri" value="{{$_GET['cuatri']}}">
                @endif
                <input type="hidden" name="save" value="si">
                <div class="col text-center">
                    <button type="submit" class="btn btn-dark">Guardar</button>
                </div>
            </form>

        </div>
    </div>

    

</div> {{-- fin del container --}}
@stop 
