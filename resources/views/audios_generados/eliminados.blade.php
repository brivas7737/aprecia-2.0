@extends('adminlte::page')

@section('title','Audios Eliminados')

@section('content_header')

<h1>Audios Eliminados</h1>

@stop

@section('content')

<div class="card">

<div class="card-body">

<table class="table table-bordered">

<thead>

<tr>

<th>ID</th>
<th>Texto</th>
<th>Fecha</th>
<th>Acción</th>

</tr>

</thead>

<tbody>

@forelse($audios as $audio)

<tr>

<td>{{ $audio->id }}</td>

<td>
{{ $audio->texto->titulo ?? 'N/A' }}
</td>

<td>
{{ $audio->deleted_at }}
</td>

<td>

<form
action="{{ route(
'audios-generados.restaurar',
$audio->id
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

No existen audios eliminados

</td>

</tr>

@endforelse

</tbody>

</table>

</div>

</div>

@stop