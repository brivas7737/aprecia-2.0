@extends('adminlte::page')

@section('title', 'Nuevo Estudiante')

@section('content_header')
    <h1>Nuevo Estudiante</h1>
@stop

@section('content')

<div class="card">

    <div class="card-body">

        <form action="{{ route('estudiantes.store') }}"
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
                    <label>Fecha de Nacimiento</label>
                    <input type="date"
                           name="fecha_nacimiento"
                           class="form-control">
                </div>

                <div class="col-md-4 mb-3">
                    <label>Edad</label>
                    <input type="number"
                           name="edad"
                           class="form-control">
                </div>

                <div class="col-md-6 mb-3">
                    <label>Teléfono</label>
                    <input type="text"
                           name="telefono"
                           class="form-control">
                </div>

                <div class="col-md-6 mb-3">
                    <label>Correo</label>
                    <input type="email"
                           name="correo"
                           class="form-control">
                </div>

                <div class="col-md-12 mb-3">
                    <label>Dirección</label>
                    <input type="text"
                           name="direccion"
                           class="form-control">
                </div>

                <div class="col-md-4 mb-3">
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

                <div class="col-md-4 mb-3">
                    <label>Nivel Educativo</label>

                    <select name="nivel_educativo_id"
                            class="form-control">

                        @foreach($niveles as $nivel)

                            <option value="{{ $nivel->id }}">
                                {{ $nivel->nombre }}
                            </option>

                        @endforeach

                    </select>

                </div>

                <div class="col-md-4 mb-3">
                    <label>Condición Visual</label>

                    <select name="condicion_visual_id"
                            class="form-control">

                        @foreach($condiciones as $condicion)

                            <option value="{{ $condicion->id }}">
                                {{ $condicion->nombre }}
                            </option>

                        @endforeach

                    </select>

                </div>

                <div class="col-md-4 mb-3">
                    <label>Código Estudiantil</label>

                    <input type="text"
                           name="codigo_estudiantil"
                           class="form-control">
                </div>

                <div class="col-md-4 mb-3">
                    <label>Fecha Registro</label>

                    <input type="date"
                           name="fecha_registro"
                           class="form-control"
                           value="{{ date('Y-m-d') }}">
                </div>

                <div class="col-md-4 mb-3">

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

            <a href="{{ route('estudiantes.index') }}"
               class="btn btn-secondary">

                Cancelar

            </a>

        </form>

    </div>

</div>

@stop