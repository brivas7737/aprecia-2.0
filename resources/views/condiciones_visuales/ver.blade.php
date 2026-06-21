@extends('adminlte::page')

@section('title','Detalle Condición Visual')

@section('content_header')

<h1>Detalle Condición Visual</h1>

@stop

@section('content')

<div class="card">

<div class="card-body">

<p>
<b>Nombre:</b>
{{ $condicion->nombre }}
</p>

<p>
<b>Descripción:</b>
{{ $condicion->descripcion }}
</p>

</div>

</div>

@stop