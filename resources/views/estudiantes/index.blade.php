@extends('adminlte::page')

@section('plugins.Datatables', true)

@section('title', 'Estudiantes')

@section('content_header')
    <h1>Estudiantes</h1>
@stop

@section('content')

<a href="{{ route('estudiantes.create') }}"
   class="btn btn-primary mb-3">

    Nuevo Estudiante

</a>

@if(session('success'))

<div class="alert alert-success">
    {{ session('success') }}
</div>

@endif

<div class="card">

    <div class="card-body">

        <table
            id="tablaEstudiantes"
            class="table table-bordered table-striped">

            <thead>

                <tr>

                    <th>ID</th>
                    <th>Código</th>
                    <th>Nombre Completo</th>
                    <th>CI</th>
                    <th>Institución</th>
                    <th>Nivel Educativo</th>
                    <th>Condición Visual</th>
                    <th>Estado</th>
                    <th>Acciones</th>

                </tr>

            </thead>

            <tbody>

            @foreach($estudiantes as $estudiante)

                <tr>

                    <td>{{ $estudiante->id }}</td>

                    <td>{{ $estudiante->codigo_estudiantil }}</td>

                    <td>
                        {{ $estudiante->nombre }}
                        {{ $estudiante->apellido }}
                    </td>

                    <td>{{ $estudiante->ci }}</td>

                    <td>
                        {{ $estudiante->institucion->nombre ?? '' }}
                    </td>

                    <td>
                        {{ $estudiante->nivelEducativo->nombre ?? '' }}
                    </td>

                    <td>
                        {{ $estudiante->condicionVisual->nombre ?? '' }}
                    </td>

                    <td>

                        @if($estudiante->activo)
                            Activo
                        @else
                            Inactivo
                        @endif

                    </td>

                    <td>

                        <a
                            href="{{ route('estudiantes.edit', $estudiante->id) }}"
                            class="btn btn-warning btn-sm">

                            Editar

                        </a>

                        <form
                            action="{{ route('estudiantes.destroy', $estudiante->id) }}"
                            method="POST"
                            style="display:inline;">

                            @csrf
                            @method('DELETE')

                            <button
                                type="submit"
                                class="btn btn-danger btn-sm"
                                onclick="return confirm('¿Eliminar estudiante?')">

                                Eliminar

                            </button>

                        </form>

                    </td>

                </tr>

            @endforeach

            </tbody>

        </table>

    </div>

</div>

@stop

@section('js')

<script>

$(document).ready(function() {

    $('#tablaEstudiantes').DataTable({

        order: [[0, 'asc']],

        language: {

            url: '//cdn.datatables.net/plug-ins/1.13.7/i18n/es-ES.json'

        }

    });

});

</script>

@stop