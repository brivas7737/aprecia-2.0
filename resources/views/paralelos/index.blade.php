@extends('adminlte::page')

@section('plugins.Datatables', true)

@section('title', 'Paralelos')

@section('content_header')
    <h1>Paralelos</h1>
@stop

@section('content')

<a href="{{ route('paralelos.create') }}" class="btn btn-primary mb-3">
    Nuevo Paralelo
</a>

<a
href="{{ route('paralelos.eliminados') }}"
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

        <table id="tablaParalelos" class="table table-bordered table-striped">

            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Acciones</th>
                </tr>
            </thead>

            <tbody>

            @foreach($paralelos as $paralelo)

                <tr>

                    <td>{{ $paralelo->id }}</td>

                    <td>{{ $paralelo->nombre }}</td>

                    <td>{{ $paralelo->descripcion }}</td>

                    <td>

                        <a href="{{ route('paralelos.edit', $paralelo->id) }}"
                           class="btn btn-warning btn-sm">
                            Editar
                        </a>

                        <form action="{{ route('paralelos.destroy', $paralelo->id) }}"
                              method="POST"
                              style="display:inline;">

                            @csrf
                            @method('DELETE')

                            <button
                                type="submit"
                                class="btn btn-danger btn-sm"
                                onclick="return confirm('¿Eliminar paralelo?')">

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

    $('#tablaParalelos').DataTable({
        language: {
            url: '//cdn.datatables.net/plug-ins/1.13.7/i18n/es-ES.json'
        }
    });

});

</script>

@stop