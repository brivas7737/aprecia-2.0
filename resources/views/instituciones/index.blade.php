@extends('adminlte::page')

@section('plugins.Datatables', true)

@section('title', 'Instituciones')

@section('content_header')
    <h1>Instituciones</h1>
@stop

@section('content')

<a href="{{ route('instituciones.create') }}" class="btn btn-primary mb-3">
    Nueva Institución
</a>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<div class="card">
    <div class="card-body">

        <table id="tablaInstituciones" class="table table-bordered table-striped">

            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Ciudad</th>
                    <th>Teléfono</th>
                    <th>Acciones</th>
                </tr>
            </thead>

            <tbody>

            @foreach($instituciones as $institucion)

                <tr>

                    <td>{{ $institucion->id }}</td>

                    <td>{{ $institucion->nombre }}</td>

                    <td>{{ $institucion->ciudad }}</td>

                    <td>{{ $institucion->telefono }}</td>

                    <td>

                        <a href="{{ route('instituciones.edit',$institucion->id) }}"
                           class="btn btn-warning btn-sm">
                            Editar
                        </a>

                        <form
                            action="{{ route('instituciones.destroy',$institucion->id) }}"
                            method="POST"
                            style="display:inline;">

                            @csrf
                            @method('DELETE')

                            <button
                                type="submit"
                                class="btn btn-danger btn-sm"
                                onclick="return confirm('¿Eliminar institución?')">

                                Eliminar

                            </button>

                        </form>

                    </td>

                </tr>

            @endforeach

            </tbody>

        </table>

        <br>

        {{ $instituciones->links() }}

    </div>
</div>

@section('js')

<script>

$(document).ready(function() {

    $('#tablaInstituciones').DataTable({
        language: {
            url: '//cdn.datatables.net/plug-ins/1.13.7/i18n/es-ES.json'
        }
    });

});

</script>
@stop
@stop