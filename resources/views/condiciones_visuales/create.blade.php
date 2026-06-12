@extends('adminlte::page')

@section('title', 'Nueva Condición Visual')

@section('content_header')
    <h1>Nueva Condición Visual</h1>
@stop

@section('content')

<div class="card">

    <div class="card-body">

        <form action="{{ route('condiciones-visuales.store') }}" method="POST">

            @csrf

            <div class="mb-3">
                <label>Nombre</label>
                <input type="text"
                       name="nombre"
                       class="form-control"
                       required>
            </div>

            <div class="mb-3">
                <label>Descripción</label>
                <textarea name="descripcion"
                          class="form-control"
                          rows="4"></textarea>
            </div>

            <button type="submit" class="btn btn-success">
                Guardar
            </button>

            <a href="{{ route('condiciones-visuales.index') }}"
               class="btn btn-secondary">
                Cancelar
            </a>

        </form>

    </div>

</div>

@stop