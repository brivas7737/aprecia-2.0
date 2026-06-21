@extends('adminlte::page')

@section('title','Niveles Educativos Eliminados')

@section('content_header')

<h1>Niveles Educativos Eliminados</h1>

@stop

@section('content')

<a href="{{ route('niveles-educativos.index') }}"
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

@forelse($niveles as $nivel)

<tr>

<td>{{ $nivel->id }}</td>

<td>{{ $nivel->nombre }}</td>

<td>

<form
action="{{ route(
'niveles-educativos.restaurar',
$nivel->id
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

No existen niveles eliminados.

</td>

</tr>

@endforelse

</tbody>

</table>

</div>

</div>

@stop