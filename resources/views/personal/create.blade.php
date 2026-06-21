@extends('adminlte::page')

@section('title', 'Nuevo Personal')

@section('content_header')
    <h1>Nuevo Personal</h1>
@stop

@section('content')

<div class="card">

    <div class="card-body">

        <form action="{{ route('personal.store') }}"
              method="POST">

            @csrf

            <div class="row">

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

                <div class="col-md-6 mb-3">

                    <label>Cargo</label>

                    <input type="text"
                           name="cargo"
                           class="form-control">

                </div>

                <div class="col-md-6 mb-3">

                    <label>Institución</label>

                    <select name="institucion_id"
                            class="form-control">

                        @foreach($instituciones as $institucion)

                            <option value="{{ $institucion->id }}">

                                {{ $institucion->nombre }}

                            </option>

                        @endforeach

                    </select>

                </div>

                <div class="col-md-6 mb-3">

                    <label>Fecha Ingreso</label>

                    <input type="date"
                           name="fecha_ingreso"
                           class="form-control"
                           value="{{ date('Y-m-d') }}">

                </div>

                <div class="col-md-6 mb-3">

                    <label>Estado</label>

                    <select name="activo"
                            class="form-control">

                        <option value="1">
                            Activo
                        </option>

                        <option value="0">
                            Inactivo
                        </option>

                    </select>

                </div>

            </div>

            <button type="submit"
                    class="btn btn-success">

                Guardar

            </button>

            <a href="{{ route('personal.index') }}"
               class="btn btn-secondary">

                Cancelar

            </a>

        </form>

    </div>

</div>

@stop