@extends('adminlte::page')

@section('title', 'Nueva Institución')

@section('content_header')
    <h1>Nueva Institución</h1>
@stop

@section('content')

<div class="card">

    <div class="card-body">

        <form action="{{ route('instituciones.store') }}" method="POST">

            @csrf

            <div class="mb-3">
                <label>Nombre</label>
                <input type="text" name="nombre" class="form-control">
            </div>

            <div class="mb-3">
                <label>Dirección</label>
                <input type="text" name="direccion" class="form-control">
            </div>

            <div class="mb-3">
                <label>Ciudad</label>
                <input type="text" name="ciudad" class="form-control">
            </div>

            <div class="mb-3">
                <label>Teléfono</label>
                <input type="text" name="telefono" class="form-control">
            </div>

            <div class="mb-3">
                <label>Correo</label>
                <input type="email" name="correo" class="form-control">
            </div>

            <div class="mb-3">
                <label>Director</label>
                <input type="text" name="director" class="form-control">
            </div>

            <button class="btn btn-success">
                Guardar
            </button>

        </form>

    </div>

</div>

@stop