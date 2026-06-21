@extends('adminlte::page')

@section('title','Tutores Eliminados')

@section('content_header')

<h1>Tutores Eliminados</h1>

@stop

@section('content')

<a href="{{ route('tutores.index') }}"
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
<th>CI</th>
<th>Acción</th>

</tr>

</thead>

<tbody>

@forelse($tutores as $tutor)

<tr>

<td>{{ $tutor->id }}</td>

<td>
{{ $tutor->nombre }}
{{ $tutor->apellido }}
</td>

<td>{{ $tutor->ci }}</td>

<td>

<form
action="{{ route(
'tutores.restaurar',
$tutor->id
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

No existen tutores eliminados.

</td>

</tr>

@endforelse

</tbody>

</table>

</div>

</div>

@stop