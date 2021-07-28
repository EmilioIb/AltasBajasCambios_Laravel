@extends('layout.plantilla')

@section('content')
<h1>Bienvenido</h1>
<p>Nombre: <span style="color: gray; font-weight: bold">{{$usuario->name}}</span></p>
<p>Fecha de creacion: <span style="color: gray; font-weight: bold">{{$usuario->created_at}}</span></p>

@stop