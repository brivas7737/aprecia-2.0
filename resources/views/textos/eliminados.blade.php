@extends('adminlte::page')

@section('title','Textos Eliminados')

@section('content_header')

<h1>Textos Eliminados</h1>

@stop

@section('content')

<div class="card">

<div class="card-body">

<table class="table table-bordered">

<thead>

<tr>

<th>ID</th>
<th>Título</th>
<th>Categoría</th>
<th>Acción</th>

</tr>

</thead>

<tbody>

@forelse($textos as $texto)

<tr>

<td>{{ $texto->id }}</td>

<td>{{ $texto->titulo }}</td>

<td>
{{ $texto->categoria->nombre ?? 'N/A' }}
</td>

<td>

<form
action="{{ route(
'textos.restaurar',
$texto->id
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

<td colspan="4"
class="text-center">

No existen textos eliminados

</td>

</tr>

@endforelse

</tbody>

</table>

</div>

</div>

@stop