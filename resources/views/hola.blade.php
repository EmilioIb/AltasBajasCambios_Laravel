@extends('layout.plantilla')
@section('content')


<div class="container col-md-5">
    <br>
    <table class="table table-striped table-hover">
        <thead>
            <th>ID</th>
            <th>Nombre</th>
        </thead>
    @foreach ($data as $d)
        <tr>
            <td>{{$d->id}}</td>
            <td>{{$d->name}}</td>
        </tr>
    @endforeach
    
    </table>
</div>

@stop

    



{{-- 
    <li>{{$d->id}} --- {{$d->name}}</li>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hola Mundo</title>
    <style>
        *{
            font-family: arial;
        }
        h3{
            border-bottom: 1px solid gray;
        }
        .datos{
            color: darkblue;
            font-weight: bold;
        }
        .aprobado{
            color: green;
            font-weight: bold;
        }
        .reprobado{
            color: red;
            font-weight: bold;
        }
    </style>
</head>
<body>

    <h3>NOMBRE</h3>
    <p>El nombre es <span class="datos">{{$nom}}</span> </p> 
    <br>

    <h3>MATERIAS</h3>
    @foreach ($mats as $mat)
        <p>La materia es <span class="datos">{{$mat}}</span></p>
    @endforeach
    <br>

    <h3>CALIFICACION</h3>
    @if ($cal >= 8)
        <p>La materia fue <span class="aprobado">aprobada</span></p>
    @else
        <p>La materia fue <span class="reprobado">reprobada</span></p>
    @endif
    <br>

   @dump($mats)  Con este comando se muestra el contenido de una variable
   
   <h3>WHILE</h3>
   @while ($num <= 3)
       <p>El numero es: {{$num++}}</p>
   @endwhile

   <h3>SWITCH</h3>
   @switch($grupo)
       @case(1)
           <p>Grupo: {{$grupo}} - Seccion A</p>
           @break
       @case(2)
            <p>Grupo: {{$grupo}} - Seccion B</p>
           @break
       @default
            <p>Grupo no valido</p>
   @endswitch

   </body>
    </html>

   --}}


