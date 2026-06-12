@extends('adminlte::page')

@section('plugins.Datatables', true)

@section('title', 'Condiciones Visuales')

@section('content_header')
    <h1>Condiciones Visuales</h1>
@stop

@section('content')

<a href="{{ route('condiciones-visuales.create') }}" class="btn btn-primary mb-3">
    Nueva Condición Visual
</a>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<div class="card">
    <div class="card-body">

        <table id="tablaCondiciones" class="table table-bordered table-striped">

            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Acciones</th>
                </tr>
            </thead>

            <tbody>

            @foreach($condiciones as $condicion)

                <tr>

                    <td>{{ $condicion->id }}</td>
                    <td>{{ $condicion->nombre }}</td>
                    <td>{{ $condicion->descripcion }}</td>

                    <td>

                        <a href="{{ route('condiciones-visuales.edit', $condicion->id) }}"
                           class="btn btn-warning btn-sm">
                            Editar
                        </a>

                        <form action="{{ route('condiciones-visuales.destroy', $condicion->id) }}"
                              method="POST"
                              style="display:inline;">

                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                    class="btn btn-danger btn-sm"
                                    onclick="return confirm('¿Eliminar condición visual?')">

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

    $('#tablaCondiciones').DataTable({
        language: {
            url: '//cdn.datatables.net/plug-ins/1.13.7/i18n/es-ES.json'
        }
    });

});

</script>

@stop