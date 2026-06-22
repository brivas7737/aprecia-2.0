@extends('adminlte::page')

@section('title', 'Editar Personal')

@section('content_header')
<h1>Editar Personal</h1>
@stop

@section('content')

<div class="card">

    <div class="card-body">

        <form action="{{ route('personal.update', $personal->id) }}" method="POST">

            @csrf
            @method('PUT')

            <div class="row">

                <div class="col-md-6 mb-3">

                    <label>Nombre</label>

                    <input type="text" name="nombre" class="form-control" value="{{ $personal->nombre }}" required>

                </div>

                <div class="col-md-6 mb-3">

                    <label>Apellido</label>

                    <input type="text" name="apellido" class="form-control" value="{{ $personal->apellido }}" required>

                </div>

                <div class="col-md-4 mb-3">

                    <label>CI</label>

                    <input type="text" name="ci" class="form-control" value="{{ $personal->ci }}">

                </div>

                <div class="col-md-4 mb-3">

                    <label>Teléfono</label>

                    <input type="text" name="telefono" class="form-control" value="{{ $personal->telefono }}">

                </div>

                <div class="col-md-4 mb-3">

                    <label>Correo</label>

                    <input type="email" name="correo" class="form-control" value="{{ $personal->correo }}">

                </div>

                <div class="col-md-6 mb-3">

                    <label>Institución</label>

                    <select name="institucion_id" class="form-control">

                        @foreach($instituciones as $institucion)

                            <option value="{{ $institucion->id }}" {{ $personal->institucion_id == $institucion->id ? 'selected' : '' }}>

                                {{ $institucion->nombre }}

                            </option>

                        @endforeach

                    </select>

                </div>

                <div class="col-md-6 mb-3">

                    <label>Rol</label>

                    <select name="rol_id" class="form-control">

                        <option value="">
                            Seleccione un rol
                        </option>

                        @foreach($roles as $rol)

                            <option value="{{ $rol->id }}" {{ $personal->rol_id == $rol->id ? 'selected' : '' }}>

                                {{ $rol->nombre }}

                            </option>

                        @endforeach

                    </select>

                </div>

                <div class="col-md-6 mb-3">

                    <label>Área de Atención</label>

                    <select name="area_atencion_id" class="form-control">

                        <option value="">
                            Seleccione un área
                        </option>

                        @foreach($areasAtencion as $area)

                            <option value="{{ $area->id }}" {{ $personal->area_atencion_id == $area->id ? 'selected' : '' }}>

                                {{ $area->nombre }}

                            </option>

                        @endforeach

                    </select>

                </div>

                <div class="col-md-6 mb-3">

                    <label>
                        Especialidad según Certificado de Egreso
                    </label>

                    <input type="text" name="especialidad_certificado" class="form-control"
                        value="{{ $personal->especialidad_certificado }}">

                </div>

                <div class="col-md-6 mb-3">

                    <label>
                        Años de Servicio
                    </label>

                    <input type="number" name="anios_servicio" class="form-control" min="0"
                        value="{{ $personal->anios_servicio }}">

                </div>

                <div class="col-md-6 mb-3">

                    <label>Fecha Ingreso</label>

                    <input type="date" name="fecha_ingreso" class="form-control" value="{{ $personal->fecha_ingreso }}">

                </div>

                <div class="col-md-6 mb-3">

                    <label>Estado</label>

                    <select name="activo" class="form-control">

                        <option value="1" {{ $personal->activo ? 'selected' : '' }}>

                            Activo

                        </option>

                        <option value="0" {{ !$personal->activo ? 'selected' : '' }}>

                            Inactivo

                        </option>

                    </select>

                </div>

            </div>

            <button type="submit" class="btn btn-primary">

                Actualizar

            </button>

            <a href="{{ route('personal.index') }}" class="btn btn-secondary">

                Cancelar

            </a>

        </form>

    </div>

</div>

@stop