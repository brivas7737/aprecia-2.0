@extends('adminlte::page')

@section('plugins.Datatables', true)
@section('plugins.DatatablesPlugins', true)

@section('title', 'Áreas de Atención')

@section('content_header')
<h1>Áreas de Atención</h1>
@stop

@section('content')

<a href="{{ route('areas-atencion.create') }}" class="btn btn-primary mb-3">
    Nueva Área de Atención
</a>

<a href="{{ route('areas-atencion.eliminados') }}" class="btn btn-warning mb-3">

    🗑 Eliminados

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

                            <a href="{{ route('areas-atencion.ver', $area->id) }}" class="btn btn-info btn-sm">

                                👁️

                            </a>

                            <a href="{{ route('areas-atencion.edit', $area->id) }}" class="btn btn-warning btn-sm">

                                ✏️

                            </a>

                            <form action="{{ route('areas-atencion.destroy', $area->id) }}" method="POST"
                                style="display:inline;">

                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('¿Eliminar área de atención?')">

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

<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>

<script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>

<script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>

<script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js"></script>

<script>

$(document).ready(function() {

$('#tablaAreas').DataTable({

    dom: 'Bfrtip',

    buttons: [

        'copy',

        'excel',

        'csv',

        'pdf',

        'print'

    ],

    language: {
        url: '//cdn.datatables.net/plug-ins/1.13.7/i18n/es-ES.json'
    }

});

});

</script>

@stop