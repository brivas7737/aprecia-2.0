@extends('adminlte::page')

@section('title','Detalle Institución')

@section('content_header')

<h1>Detalle Institución</h1>

@stop

@section('content')

<div class="card">

<div class="card-body">

<p><b>Nombre:</b>
{{ $institucion->nombre }}</p>

<p><b>Ciudad:</b>
{{ $institucion->ciudad }}</p>

<p><b>Dirección:</b>
{{ $institucion->direccion }}</p>

<p><b>Teléfono:</b>
{{ $institucion->telefono }}</p>

<p><b>Correo:</b>
{{ $institucion->correo }}</p>

<p><b>Director:</b>
{{ $institucion->director }}</p>

</div>

</div>

@stop