@extends('adminlte::page')

@section('plugins.Datatables', true)

@section('title', 'Programas')

@section('content_header')
    <h1>Programas</h1>
@stop

@section('content')

<a href="{{ route('programas.create') }}" class="btn btn-primary mb-3">
    Nuevo Programa
</a>

<a
href="{{ route('programas.eliminados') }}"
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

        <table id="tablaProgramas" class="table table-bordered table-striped">

            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
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

                        <a href="{{ route('programas.edit', $programa->id) }}"
                           class="btn btn-warning btn-sm">
                            Editar
                        </a>

                        <form action="{{ route('programas.destroy', $programa->id) }}"
                              method="POST"
                              style="display:inline;">

                            @csrf
                            @method('DELETE')

                            <button
                                type="submit"
                                class="btn btn-danger btn-sm"
                                onclick="return confirm('¿Eliminar programa?')">

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
        language: {
            url: '//cdn.datatables.net/plug-ins/1.13.7/i18n/es-ES.json'
        }
    });

});

</script>

@stop