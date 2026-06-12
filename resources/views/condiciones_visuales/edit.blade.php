@extends('adminlte::page')

@section('title', 'Editar Condición Visual')

@section('content_header')
    <h1>Editar Condición Visual</h1>
@stop

@section('content')

<div class="card">

    <div class="card-body">

        <form action="{{ route('condiciones-visuales.update', $condicion->id) }}"
              method="POST">

            @csrf
            @method('PUT')

            <div class="mb-3">
                <label>Nombre</label>
                <input type="text"
                       name="nombre"
                       class="form-control"
                       value="{{ $condicion->nombre }}"
                       required>
            </div>

            <div class="mb-3">
                <label>Descripción</label>
                <textarea name="descripcion"
                          class="form-control"
                          rows="4">{{ $condicion->descripcion }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">
                Actualizar
            </button>

            <a href="{{ route('condiciones-visuales.index') }}"
               class="btn btn-secondary">
                Cancelar
            </a>

        </form>

    </div>

</div>

@stop