@extends('adminlte::page')

@section('title', 'Nuevo Programa o Servicio')

@section('content_header')
    <h1>Nuevo Programa o Servicio</h1>
@stop

@section('content')

<div class="card">

    <div class="card-body">

        <form action="{{ route('programas-servicios.store') }}"
              method="POST">

            @csrf

            <div class="mb-3">

                <label>Nombre</label>

                <input
                    type="text"
                    name="nombre"
                    class="form-control"
                    required>

            </div>

            <div class="mb-3">

                <label>Descripción</label>

                <textarea
                    name="descripcion"
                    class="form-control"
                    rows="4"></textarea>

            </div>

            <div class="mb-3">

                <label>Estado</label>

                <select
                    name="estado"
                    class="form-control">

                    <option value="1">
                        Activo
                    </option>

                    <option value="0">
                        Inactivo
                    </option>

                </select>

            </div>

            <button
                type="submit"
                class="btn btn-success">

                Guardar

            </button>

            <a href="{{ route('programas-servicios.index') }}"
               class="btn btn-secondary">

                Cancelar

            </a>

        </form>

    </div>

</div>

@stop