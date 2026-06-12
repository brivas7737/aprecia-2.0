@extends('adminlte::page')

@section('title', 'Editar Nivel Educativo')

@section('content_header')
    <h1>Editar Nivel Educativo</h1>
@stop

@section('content')

<div class="card">

    <div class="card-body">

        <form action="{{ route('niveles-educativos.update', $nivel->id) }}"
              method="POST">

            @csrf
            @method('PUT')

            <div class="mb-3">
                <label>Nombre</label>
                <input type="text"
                       name="nombre"
                       class="form-control"
                       value="{{ $nivel->nombre }}"
                       required>
            </div>

            <div class="mb-3">
                <label>Descripción</label>
                <textarea name="descripcion"
                          class="form-control"
                          rows="4">{{ $nivel->descripcion }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">
                Actualizar
            </button>

            <a href="{{ route('niveles-educativos.index') }}"
               class="btn btn-secondary">
                Cancelar
            </a>

        </form>

    </div>

</div>

@stop