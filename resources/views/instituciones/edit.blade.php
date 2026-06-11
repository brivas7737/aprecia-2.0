@extends('adminlte::page')

@section('title', 'Editar Institución')

@section('content_header')
    <h1>Editar Institución</h1>
@stop

@section('content')

<div class="card">

    <div class="card-body">

        <form action="{{ route('instituciones.update',$institucion->id) }}"
              method="POST">

            @csrf
            @method('PUT')

            <div class="mb-3">
                <label>Nombre</label>
                <input type="text"
                       name="nombre"
                       class="form-control"
                       value="{{ $institucion->nombre }}">
            </div>

            <div class="mb-3">
                <label>Dirección</label>
                <input type="text"
                       name="direccion"
                       class="form-control"
                       value="{{ $institucion->direccion }}">
            </div>

            <div class="mb-3">
                <label>Ciudad</label>
                <input type="text"
                       name="ciudad"
                       class="form-control"
                       value="{{ $institucion->ciudad }}">
            </div>

            <div class="mb-3">
                <label>Teléfono</label>
                <input type="text"
                       name="telefono"
                       class="form-control"
                       value="{{ $institucion->telefono }}">
            </div>

            <div class="mb-3">
                <label>Correo</label>
                <input type="email"
                       name="correo"
                       class="form-control"
                       value="{{ $institucion->correo }}">
            </div>

            <div class="mb-3">
                <label>Director</label>
                <input type="text"
                       name="director"
                       class="form-control"
                       value="{{ $institucion->director }}">
            </div>

            <button class="btn btn-primary">
                Actualizar
            </button>

        </form>

    </div>

</div>

@stop