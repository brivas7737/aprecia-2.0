@extends('adminlte::page')

@section('plugins.Datatables', true)

@section('title', 'Programas y Servicios')

@section('content_header')
    <h1>Programas y Servicios</h1>
@stop

@section('content')

<a href="{{ route('programas-servicios.create') }}"
   class="btn btn-primary mb-3">

    Nuevo Programa o Servicio

</a>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<div class="card">

    <div class="card-body">

        <table id="tablaProgramas"
               class="table table-bordered table-striped">

            <thead>

                <tr>

                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Estado</th>
                    <th>Acciones</th>

                </tr>

            </thead>

            <tbody>

            @foreach($programas as $programa)

                <tr>

                    <td>{{ $programa->id }}</td>

                    <td>{{ $programa->nombre }}</td>

                    <td>{{ $programa->descripcion }}</td>

                    <td>

                        @if($programa->estado)
                            Activo
                        @else
                            Inactivo
                        @endif

                    </td>

                    <td>

                        <a href="{{ route('programas-servicios.edit', $programa->id) }}"
                           class="btn btn-warning btn-sm">

                            Editar

                        </a>

                        <form
                            action="{{ route('programas-servicios.destroy', $programa->id) }}"
                            method="POST"
                            style="display:inline;">

                            @csrf
                            @method('DELETE')

                            <button
                                type="submit"
                                class="btn btn-danger btn-sm"
                                onclick="return confirm('¿Eliminar programa o servicio?')">

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

    $('#tablaProgramas').DataTable({
        order: [[0, 'asc']],
        language: {
            url: '//cdn.datatables.net/plug-ins/1.13.7/i18n/es-ES.json'
        }
    });

});

</script>

@stop