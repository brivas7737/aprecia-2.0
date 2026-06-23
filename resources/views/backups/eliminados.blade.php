@extends('adminlte::page')

@section('title', 'Backups Eliminados')
@section('plugins.Datatables', true)
@section('plugins.DatatablesPlugins', true)

@section('content_header')

<h1>Backups Eliminados</h1>

@stop

@section('content')

<a href="{{ route('backups.index') }}"
   class="btn btn-primary mb-3">

    Volver

</a>

<div class="card">

    <div class="card-body">

        <table
    id="tablaBackupsEliminados"
    class="table table-bordered table-striped">

            <thead>

                <tr>

                    <th>ID</th>

                    <th>Archivo</th>

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
                        {{ $backup->fecha_generacion }}
                    </td>

                    <td>

                        <form
                            action="{{ route(
                                'backups.restaurar',
                                $backup->id
                            ) }}"
                            method="POST">

                            @csrf

                            <button
                                class="btn btn-success btn-sm">

                                ↩ Restaurar

                            </button>

                            <form
    action="{{ route(
        'backups.eliminarDefinitivo',
        $backup->id
    ) }}"
    method="POST"
    style="display:inline;">

    @csrf
    @method('DELETE')

    <button
        class="btn btn-danger btn-sm"
        onclick="return confirm(
        '¿Eliminar definitivamente este backup?'
        )">

        ✖ Definitivo

    </button>

</form>

                        </form>

                    </td>

                </tr>

                @empty

                <tr>

                    <td colspan="4"
                        class="text-center">

                        No existen backups eliminados.

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

    $('#tablaBackupsEliminados').DataTable({

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