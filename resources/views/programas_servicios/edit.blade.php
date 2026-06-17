@extends('adminlte::page')

@section('title', 'Editar Programa o Servicio')

@section('content_header')
    <h1>Editar Programa o Servicio</h1>
@stop

@section('content')

<div class="card">

    <div class="card-body">

        <form
            action="{{ route('programas-servicios.update', $programa->id) }}"
            method="POST">

            @csrf
            @method('PUT')

            <div class="mb-3">

                <label>Nombre</label>

                <input
                    type="text"
                    name="nombre"
                    class="form-control"
                    value="{{ $programa->nombre }}"
                    required>

            </div>

            <div class="mb-3">

                <label>Descripción</label>

                <textarea
                    name="descripcion"
                    class="form-control"
                    rows="4">{{ $programa->descripcion }}</textarea>

            </div>

            <div class="mb-3">

                <label>Estado</label>

                <select
                    name="estado"
                    class="form-control">

                    <option value="1"
                        {{ $programa->estado ? 'selected' : '' }}>
                        Activo
                    </option>

                    <option value="0"
                        {{ !$programa->estado ? 'selected' : '' }}>
                        Inactivo
                    </option>

                </select>

            </div>

            <button
                type="submit"
                class="btn btn-primary">

                Actualizar

            </button>

            <a href="{{ route('programas-servicios.index') }}"
               class="btn btn-secondary">

                Cancelar

            </a>

        </form>

    </div>

</div>

@stop