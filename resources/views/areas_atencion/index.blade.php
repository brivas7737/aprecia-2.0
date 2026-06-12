@extends('adminlte::page')

@section('plugins.Datatables', true)

@section('title', 'Áreas de Atención')

@section('content_header')
    <h1>Áreas de Atención</h1>
@stop

@section('content')

<a href="{{ route('areas-atencion.create') }}" class="btn btn-primary mb-3">
    Nueva Área de Atención
</a>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<div class="card">
    <div class="card-body">

        <table id="tablaAreas" class="table table-bordered table-striped">

            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Acciones</th>
                </tr>
            </thead>

            <tbody>

            @foreach($areas as $area)

                <tr>

                    <td>{{ $area->id }}</td>

                    <td>{{ $area->nombre }}</td>

                    <td>{{ $area->descripcion }}</td>

                    <td>

                        <a href="{{ route('areas-atencion.edit', $area->id) }}"
                           class="btn btn-warning btn-sm">
                            Editar
                        </a>

                        <form action="{{ route('areas-atencion.destroy', $area->id) }}"
                              method="POST"
                              style="display:inline;">

                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                    class="btn btn-danger btn-sm"
                                    onclick="return confirm('¿Eliminar área de atención?')">

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

    $('#tablaAreas').DataTable({
        language: {
            url: '//cdn.datatables.net/plug-ins/1.13.7/i18n/es-ES.json'
        }
    });

});

</script>

@stop