@extends('adminlte::page')

@section('title','Instituciones Eliminadas')

@section('content_header')

<h1>Instituciones Eliminadas</h1>

@stop

@section('content')

<a href="{{ route('instituciones.index') }}"
class="btn btn-primary mb-3">

Volver

</a>

<div class="card">

<div class="card-body">

<table class="table table-bordered">

<thead>

<tr>

<th>ID</th>
<th>Nombre</th>
<th>Ciudad</th>
<th>Acción</th>

</tr>

</thead>

<tbody>

@forelse($instituciones as $institucion)

<tr>

<td>{{ $institucion->id }}</td>

<td>{{ $institucion->nombre }}</td>

<td>{{ $institucion->ciudad }}</td>

<td>

<form
action="{{ route(
'instituciones.restaurar',
$institucion->id
) }}"
method="POST">

@csrf

<button
class="btn btn-success btn-sm">

↩ Restaurar

</button>

</form>

</td>

</tr>

@empty

<tr>

<td colspan="4">

No existen instituciones eliminadas.

</td>

</tr>

@endforelse

</tbody>

</table>

</div>

</div>

@stop