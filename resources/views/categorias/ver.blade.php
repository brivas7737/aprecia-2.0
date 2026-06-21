@extends('adminlte::page')

@section('title','Detalle Categoría')

@section('content_header')

<h1>Detalle Categoría</h1>

@stop

@section('content')

<div class="card">

<div class="card-body">

<p>
<b>Nombre:</b>
{{ $categoria->nombre }}
</p>

<p>
<b>Descripción:</b>
{{ $categoria->descripcion }}
</p>

</div>

</div>

@stop