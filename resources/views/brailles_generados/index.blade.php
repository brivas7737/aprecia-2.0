@extends('adminlte::page')

@section('title', 'Brailles Generados')

@section('plugins.Datatables', true)
@section('plugins.DatatablesPlugins', true)

@section('content_header')

<h1>Brailles Generados</h1>

<a href="{{ route('braille.eliminados') }}" class="btn btn-warning mb-3">

    🗑 Eliminados

</a>

@stop

@section('content')

@if(session('success'))

    <div class="alert alert-success">

        {{ session('success') }}

    </div>

@endif

<div class="card">

    <div class="card-body">

        <table id="tablaBrailles" class="table table-bordered table-striped">

            <thead>

                <tr>

                    <th>ID</th>

                    <th>Texto</th>

                    <th>Archivo BRF</th>

                    <th>Fecha Generación</th>

                    <th>Acciones</th>

                </tr>

            </thead>

            <tbody>

                @forelse($brailles as $braille)

                                <tr>

                                    <td>

                                        {{ $braille->id }}

                                    </td>

                                    <td>

                                        {{ $braille->texto->titulo ?? 'N/A' }}

                                    </td>

                                    <td>

                                        {{ basename($braille->archivo_brf) }}

                                    </td>

                                    <td>

                                        {{ $braille->fecha_generacion }}

                                    </td>

                                    <td>

                                        <a href="{{ route(
                        'braille.ver',
                        $braille->id
                    ) }}" class="btn btn-info btn-sm">

                                            Ver

                                        </a>

                                        <a href="{{ route(
                        'braille.descargar',
                        $braille->id
                    ) }}" class="btn btn-primary btn-sm">

                                            Descargar

                                        </a>

                                        <form action="{{ route(
                        'braille.destroy',
                        $braille->id
                    ) }}" method="POST" style="display:inline;">

                                            @csrf
                                            @method('DELETE')

                                            <button class="btn btn-danger btn-sm">

                                                🗑

                                            </button>

                                        </form>

                                    </td>

                                </tr>

                @empty

                    <tr>

                        <td colspan="5" class="text-center">

                            No existen brailles generados.

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

    $(document).ready(function () {

        $('#tablaBrailles').DataTable({

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