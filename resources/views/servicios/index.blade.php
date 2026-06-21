@extends('adminlte::page')

@section('plugins.Datatables', true)

@section('title', 'Servicios')

@section('content_header')
    <h1>Servicios</h1>
@stop

@section('content')

<a href="{{ route('servicios.create') }}" class="btn btn-primary mb-3">
    Nuevo Servicio
</a>

<a
href="{{ route('servicios.eliminados') }}"
class="btn btn-warning mb-3">

🗑 Eliminados

</a>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<div class="card">
    <div class="card-body">

        <table id="tablaServicios" class="table table-bordered table-striped">

            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Acciones</th>
                </tr>
            </thead>

            <tbody>

            @foreach($servicios as $servicio)

                <tr>

                    <td>{{ $servicio->id }}</td>

                    <td>{{ $servicio->nombre }}</td>

                    <td>{{ $servicio->descripcion }}</td>

                    <td>

                        <a href="{{ route('servicios.edit', $servicio->id) }}"
                           class="btn btn-warning btn-sm">
                            Editar
                        </a>

                        <form action="{{ route('servicios.destroy', $servicio->id) }}"
                              method="POST"
                              style="display:inline;">

                            @csrf
                            @method('DELETE')

                            <button
                                type="submit"
                                class="btn btn-danger btn-sm"
                                onclick="return confirm('¿Eliminar servicio?')">

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

    $('#tablaServicios').DataTable({
        language: {
            url: '//cdn.datatables.net/plug-ins/1.13.7/i18n/es-ES.json'
        }
    });

});

</script>

@stop