@extends('adminlte::page')

@section('title', 'Editar Servicio')

@section('content_header')
    <h1>Editar Servicio</h1>
@stop

@section('content')

<div class="card">
    <div class="card-body">

        <form action="{{ route('servicios.update', $servicio->id) }}"
              method="POST">

            @csrf
            @method('PUT')

            <div class="mb-3">
                <label>Nombre</label>
                <input type="text"
                       name="nombre"
                       class="form-control"
                       value="{{ $servicio->nombre }}"
                       required>
            </div>

            <div class="mb-3">
                <label>Descripción</label>
                <textarea name="descripcion"
                          class="form-control"
                          rows="4">{{ $servicio->descripcion }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">
                Actualizar
            </button>

            <a href="{{ route('servicios.index') }}"
               class="btn btn-secondary">
                Cancelar
            </a>

        </form>

    </div>
</div>

@stop