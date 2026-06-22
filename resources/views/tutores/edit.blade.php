@extends('adminlte::page')

@section('title', 'Editar Tutor')

@section('content_header')
<h1>Editar Tutor</h1>
@stop

@section('content')

@if ($errors->any())

    <div class="alert alert-danger">

        <ul class="mb-0">

            @foreach ($errors->all() as $error)

                <li>{{ $error }}</li>

            @endforeach

        </ul>

    </div>

@endif

<div class="card">

    <div class="card-body">

        <form action="{{ route('tutores.update', $tutor->id) }}" method="POST">

            @csrf
            @method('PUT')

            <div class="row">

                <div class="col-md-6 mb-3">

                    <select name="estudiante_id" class="form-control">

                        <option value="">
                            Sin estudiante asociado
                        </option>

                        @foreach($estudiantes as $estudiante)

                            <option value="{{ $estudiante->id }}" {{ $tutor->estudiante_id == $estudiante->id ? 'selected' : '' }}>

                                {{ $estudiante->apellido }}
                                {{ $estudiante->nombre }}

                            </option>

                        @endforeach

                    </select>

                </div>

                <div class="col-md-6 mb-3">

                    <label>Parentesco</label>

                    <select name="parentesco" class="form-control">

                        <option value="" {{ empty($tutor->parentesco) ? 'selected' : '' }}>
                            Sin especificar
                        </option>

                        <option value="Padre" {{ $tutor->parentesco == 'Padre' ? 'selected' : '' }}>
                            Padre
                        </option>

                        <option value="Madre" {{ $tutor->parentesco == 'Madre' ? 'selected' : '' }}>
                            Madre
                        </option>

                        <option value="Tutor Legal" {{ $tutor->parentesco == 'Tutor Legal' ? 'selected' : '' }}>
                            Tutor Legal
                        </option>

                        <option value="Hermano" {{ $tutor->parentesco == 'Hermano' ? 'selected' : '' }}>
                            Hermano
                        </option>

                        <option value="Otro Familiar" {{ $tutor->parentesco == 'Otro Familiar' ? 'selected' : '' }}>
                            Otro Familiar
                        </option>

                    </select>

                </div>

                <div class="col-md-6 mb-3">

                    <label>Nombre</label>

                    <input type="text" name="nombre" class="form-control" value="{{ $tutor->nombre }}" required>

                </div>

                <div class="col-md-6 mb-3">

                    <label>Apellido</label>

                    <input type="text" name="apellido" class="form-control" value="{{ $tutor->apellido }}" required>

                </div>

                <div class="col-md-4 mb-3">

                    <label>CI</label>

                    <input type="text" name="ci" class="form-control" value="{{ $tutor->ci }}">

                </div>

                <div class="col-md-4 mb-3">

                    <label>Teléfono</label>

                    <input type="text" name="telefono" class="form-control" value="{{ $tutor->telefono }}">

                </div>

                <div class="col-md-4 mb-3">

                    <label>Correo</label>

                    <input type="email" name="correo" class="form-control" value="{{ $tutor->correo }}">

                </div>

                <div class="col-md-12 mb-3">

                    <label>Dirección</label>

                    <input type="text" name="direccion" class="form-control" value="{{ $tutor->direccion }}">

                </div>

            </div>

            <button type="submit" class="btn btn-primary">

                Actualizar

            </button>

            <a href="{{ route('tutores.index') }}" class="btn btn-secondary">

                Cancelar

            </a>

        </form>

    </div>

</div>

@stop