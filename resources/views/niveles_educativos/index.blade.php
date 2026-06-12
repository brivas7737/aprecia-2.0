@extends('adminlte::page')

@section('plugins.Datatables', true)

@section('title', 'Niveles Educativos')

@section('content_header')
    <h1>Niveles Educativos</h1>
@stop

@section('content')

<a href="{{ route('niveles-educativos.create') }}" class="btn btn-primary mb-3">
    Nuevo Nivel Educativo
</a>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<div class="card">
    <div class="card-body">

        <table id="tablaNiveles" class="table table-bordered table-striped">

            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Acciones</th>
                </tr>
            </thead>

            <tbody>

            @foreach($niveles as $nivel)

                <tr>

                    <td>{{ $nivel->id }}</td>

                    <td>{{ $nivel->nombre }}</td>

                    <td>{{ $nivel->descripcion }}</td>

                    <td>

                        <a href="{{ route('niveles-educativos.edit', $nivel->id) }}"
                           class="btn btn-warning btn-sm">
                            Editar
                        </a>

                        <form action="{{ route('niveles-educativos.destroy', $nivel->id) }}"
                              method="POST"
                              style="display:inline;">

                            @csrf
                            @method('DELETE')

                            <button
                                type="submit"
                                class="btn btn-danger btn-sm"
                                onclick="return confirm('¿Eliminar nivel educativo?')">

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

    $('#tablaNiveles').DataTable({
    pageLength: 10,
    ordering: true,
    order: [[0, 'asc']],
    language: {
        url: '//cdn.datatables.net/plug-ins/1.13.7/i18n/es-ES.json'
    }
});

});

</script>

@stop