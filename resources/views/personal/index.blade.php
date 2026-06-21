@extends('adminlte::page')

@section('plugins.Datatables', true)

@section('title', 'Personal')

@section('content_header')
<h1>Personal</h1>
@stop

@section('content')

<a href="{{ route('personal.create') }}" class="btn btn-primary mb-3">

    Nuevo Personal
    <a href="{{ route('personal.eliminados') }}" class="btn btn-warning mb-3">

        🗑 Eliminados

    </a>

</a>


@if(session('success'))

    <div class="alert alert-success">
        {{ session('success') }}
    </div>

@endif

<div class="card">

    <div class="card-body">

        <table id="tablaPersonal" class="table table-bordered table-striped">

            <thead>

                <tr>

                    <th>ID</th>
                    <th>Nombre Completo</th>
                    <th>CI</th>
                    <th>Cargo</th>
                    <th>Institución</th>
                    <th>Teléfono</th>
                    <th>Estado</th>
                    <th>Acciones</th>

                </tr>

            </thead>

            <tbody>

                @foreach($personal as $persona)

                    <tr>

                        <td>{{ $persona->id }}</td>

                        <td>
                            {{ $persona->nombre }}
                            {{ $persona->apellido }}
                        </td>

                        <td>{{ $persona->ci }}</td>

                        <td>{{ $persona->cargo }}</td>

                        <td>
                            {{ $persona->institucion->nombre ?? '' }}
                        </td>

                        <td>{{ $persona->telefono }}</td>

                        <td>

                            @if($persona->activo)

                                Activo

                            @else

                                Inactivo

                            @endif

                        </td>

                        <td>
<a
href="{{ route(
'personal.ver',
$persona->id
) }}"
class="btn btn-info btn-sm">

👁️

</a>


                            <a href="{{ route('personal.edit', $persona->id) }}" class="btn btn-warning btn-sm">

                                ✏️

                            </a>

                            <form action="{{ route('personal.destroy', $persona->id) }}" method="POST"
                                style="display:inline;">

                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('¿Eliminar registro?')">

                                    🗑️

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

    $(document).ready(function () {

        $('#tablaPersonal').DataTable({

            language: {

                url: '//cdn.datatables.net/plug-ins/1.13.7/i18n/es-ES.json'

            }

        });

    });

</script>

@stop