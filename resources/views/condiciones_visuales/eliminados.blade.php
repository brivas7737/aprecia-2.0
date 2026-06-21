@extends('adminlte::page')

@section('title','Condiciones Visuales Eliminadas')

@section('content_header')

<h1>Condiciones Visuales Eliminadas</h1>

@stop

@section('content')

<a href="{{ route('condiciones-visuales.index') }}"
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
<th>Acción</th>

</tr>

</thead>

<tbody>

@forelse($condiciones as $condicion)

<tr>

<td>{{ $condicion->id }}</td>

<td>{{ $condicion->nombre }}</td>

<td>

<form
action="{{ route(
'condiciones-visuales.restaurar',
$condicion->id
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

<td colspan="3">

No existen condiciones visuales eliminadas.

</td>

</tr>

@endforelse

</tbody>

</table>

</div>

</div>

@stop