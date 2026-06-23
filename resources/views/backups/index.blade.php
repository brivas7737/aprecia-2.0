@extends('adminlte::page')

@section('title', 'Backups')

@section('plugins.Datatables', true)
@section('plugins.DatatablesPlugins', true)

@section('content_header')

<h1>Backups del Sistema</h1>

@stop

@section('content')

@if(session('success'))

    <div class="alert alert-success">

        {{ session('success') }}

    </div>

@endif

@if(session('error'))

    <div class="alert alert-danger">

        {{ session('error') }}

    </div>

@endif

<form action="{{ route('backups.generar') }}" method="POST">

    @csrf

    <button class="btn btn-success mb-3">

        Generar Backup

    </button>

    <a href="{{ route('backups.eliminados') }}"
   class="btn btn-warning mb-3">

    Eliminados

</a>

</form>

<div class="card">

    <div class="card-body">

        <table class="table table-bordered" id="tablaBackups">

            <thead>

                <tr>

                    <th>ID</th>

                    <th>Archivo</th>

                    <th>Tamaño</th>

                    <th>Fecha</th>

                    <th>Acción</th>

                </tr>

            </thead>

            <tbody>

                @forelse($backups as $backup)

                                <tr>

                                    <td>
                                        {{ $backup->id }}
                                    </td>

                                    <td>
                                        {{ $backup->nombre_archivo }}
                                    </td>

                                    <td>

@if($backup->tamano < 1024)

    {{ $backup->tamano }} B

@elseif($backup->tamano < 1048576)

    {{ round($backup->tamano / 1024, 2) }} KB

@else

    {{ round($backup->tamano / 1048576, 2) }} MB

@endif

</td>

                                    <td>
                                        {{ $backup->fecha_generacion }}
                                    </td>

<td>

    <a
    href="{{ route(
        'backups.descargar',
        $backup->id
    ) }}"
    class="btn btn-primary btn-sm">

        ⬇

    </a>

    <form
        action="{{ route(
            'backups.destroy',
            $backup->id
        ) }}"
        method="POST"
        style="display:inline;">

        @csrf
        @method('DELETE')

        <button
            class="btn btn-danger btn-sm"
            onclick="return confirm(
            '¿Eliminar este backup?'
            )">

            🗑

        </button>

    </form>

</td>

                                </tr>

                @empty

                    <tr>

                        <td colspan="5" class="text-center">

                            No existen backups.

                        </td>

                    </tr>

                @endforelse

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

$('#tablaBackups').DataTable({

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