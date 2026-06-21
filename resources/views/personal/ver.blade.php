@extends('adminlte::page')

@section('title','Detalle Personal')

@section('content_header')

<h1>Detalle Personal</h1>

@stop

@section('content')

<div class="card">

<div class="card-body">

<p><b>Nombre:</b>
{{ $personal->nombre }}
{{ $personal->apellido }}</p>

<p><b>CI:</b>
{{ $personal->ci }}</p>

<p><b>Correo:</b>
{{ $personal->correo }}</p>

<p><b>Teléfono:</b>
{{ $personal->telefono }}</p>

<p><b>Cargo:</b>
{{ $personal->cargo }}</p>

<p><b>Institución:</b>
{{ $personal->institucion->nombre ?? '' }}</p>

<p><b>Fecha Ingreso:</b>
{{ $personal->fecha_ingreso }}</p>

</div>

</div>

@stop