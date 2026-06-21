@extends('adminlte::page')

@section('title','Detalle Nivel Educativo')

@section('content_header')

<h1>Detalle Nivel Educativo</h1>

@stop

@section('content')

<div class="card">

<div class="card-body">

<p>
<b>Nombre:</b>
{{ $nivel->nombre }}
</p>

<p>
<b>Descripción:</b>
{{ $nivel->descripcion }}
</p>

</div>

</div>

@stop