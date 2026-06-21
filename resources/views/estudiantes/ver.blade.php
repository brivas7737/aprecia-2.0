@extends('adminlte::page')

@section('title','Detalle Estudiante')

@section('content_header')

<h1>Detalle Estudiante</h1>

@stop

@section('content')

<div class="card">

<div class="card-body">

<p><b>Nombre:</b> {{ $estudiante->nombre }} {{ $estudiante->apellido }}</p>

<p><b>CI:</b> {{ $estudiante->ci }}</p>

<p><b>RUDEES:</b> {{ $estudiante->rudees }}</p>

<p><b>Programa:</b> {{ $estudiante->programa->nombre ?? 'No aplica' }}</p>

<p><b>Servicio:</b> {{ $estudiante->servicio->nombre ?? 'No aplica' }}</p>

<p><b>Paralelo:</b> {{ $estudiante->paralelo->nombre ?? '' }}</p>

<p><b>Institución:</b> {{ $estudiante->institucion->nombre ?? '' }}</p>

<p><b>Nivel:</b> {{ $estudiante->nivelEducativo->nombre ?? '' }}</p>

<p><b>Condición:</b> {{ $estudiante->condicionVisual->nombre ?? '' }}</p>

</div>

</div>

@stop