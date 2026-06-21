@extends('adminlte::page')

@section('title','Detalle Tutor')

@section('content_header')

<h1>Detalle Tutor</h1>

@stop

@section('content')

<div class="card">

<div class="card-body">

<p>
<b>Nombre:</b>
{{ $tutor->nombre }}
{{ $tutor->apellido }}
</p>

<p>
<b>CI:</b>
{{ $tutor->ci }}
</p>

<p>
<b>Teléfono:</b>
{{ $tutor->telefono }}
</p>

<p>
<b>Correo:</b>
{{ $tutor->correo }}
</p>

<p>
<b>Dirección:</b>
{{ $tutor->direccion }}
</p>

<p>
<b>Parentesco:</b>
{{ $tutor->parentesco }}
</p>

<p>
<b>Estudiante:</b>

@if($tutor->estudiante)

{{ $tutor->estudiante->nombre }}
{{ $tutor->estudiante->apellido }}

@else

Sin estudiante asociado

@endif

</p>

</div>

</div>

@stop