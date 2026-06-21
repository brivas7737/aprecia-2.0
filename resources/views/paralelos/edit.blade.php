@extends('adminlte::page')

@section('title', 'Editar Paralelo')

@section('content_header')
    <h1>Editar Paralelo</h1>
@stop

@section('content')

<div class="card">
    <div class="card-body">

        <form action="{{ route('paralelos.update', $paralelo->id) }}"
              method="POST">

            @csrf
            @method('PUT')

            <div class="mb-3">
                <label>Nombre</label>
                <input type="text"
                       name="nombre"
                       class="form-control"
                       value="{{ $paralelo->nombre }}"
                       required>
            </div>

            <div class="mb-3">
                <label>Descripción</label>
                <textarea name="descripcion"
                          class="form-control"
                          rows="4">{{ $paralelo->descripcion }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">
                Actualizar
            </button>

            <a href="{{ route('paralelos.index') }}"
               class="btn btn-secondary">
                Cancelar
            </a>

        </form>

    </div>
</div>

@stop