@extends('adminlte::page')

@section('title','Nuevo Tutor')

@section('content_header')
<h1>Registrar Tutor</h1>
@stop

@section('content')

<div class="card">

<div class="card-body">

<form action="{{ route('tutores.store') }}"
      method="POST">

@csrf

<div class="row">

<div class="col-md-6 mb-3">

<label>Estudiante</label>

<select name="estudiante_id"
        class="form-control"
        required>

<option value="">
Seleccione...
</option>

@foreach($estudiantes as $estudiante)

<option value="{{ $estudiante->id }}">

{{ $estudiante->nombre }}
{{ $estudiante->apellido }}

</option>

@endforeach

</select>

</div>

<div class="col-md-6 mb-3">

<label>Parentesco</label>

<select name="parentesco"
        class="form-control">

<option>Padre</option>
<option>Madre</option>
<option>Tutor Legal</option>
<option>Hermano</option>
<option>Otro Familiar</option>

</select>

</div>

<div class="col-md-6 mb-3">

<label>Nombre</label>

<input type="text"
       name="nombre"
       class="form-control"
       required>

</div>

<div class="col-md-6 mb-3">

<label>Apellido</label>

<input type="text"
       name="apellido"
       class="form-control"
       required>

</div>

<div class="col-md-4 mb-3">

<label>CI</label>

<input type="text"
       name="ci"
       class="form-control">

</div>

<div class="col-md-4 mb-3">

<label>Teléfono</label>

<input type="text"
       name="telefono"
       class="form-control">

</div>

<div class="col-md-4 mb-3">

<label>Correo</label>

<input type="email"
       name="correo"
       class="form-control">

</div>

<div class="col-md-12 mb-3">

<label>Dirección</label>

<input type="text"
       name="direccion"
       class="form-control">

</div>

</div>

<button class="btn btn-success">
Guardar
</button>

<a href="{{ route('tutores.index') }}"
   class="btn btn-secondary">
Cancelar
</a>

</form>

</div>

</div>

@stop