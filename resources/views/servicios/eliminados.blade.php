@extends('adminlte::page')

@section('plugins.Datatables', true)
@section('plugins.DatatablesPlugins', true)

@section('title', 'Servicios Eliminados')

@section('content_header')

<h1>Servicios Eliminados</h1>

@stop

@section('content')

@if(session('success'))

    <div class="alert alert-success">

        {{ session('success') }}

    </div>

@endif

<a href="{{ route('servicios.index') }}" class="btn btn-primary mb-3">

    Volver

</a>

<div class="card">

    <div class="card-body">

        <table id="tablaEliminados" class="table table-bordered table-striped">

            <thead>

                <tr>

                    <th>ID</th>

                    <th>Nombre</th>

                    <th>Descripción</th>

                    <th>Fecha Eliminación</th>

                    <th>Acciones</th>

                </tr>

            </thead>

            <tbody>

                @forelse($servicios as $servicio)

                                <tr>

                                    <td>
                                        {{ $servicio->id }}
                                    </td>

                                    <td>
                                        {{ $servicio->nombre }}
                                    </td>

                                    <td>
                                        {{ $servicio->descripcion }}
                                    </td>

                                    <td>
                                        {{ $servicio->deleted_at }}
                                    </td>

                                    <td>

                                        <form action="{{ route(
                        'servicios.restaurar',
                        $servicio->id
                    ) }}" method="POST" style="display:inline;">

                                            @csrf

                                            <button class="btn btn-success btn-sm">

                                                ♻ Restaurar

                                            </button>

                                        </form>

                                        <form action="{{ route(
                        'servicios.eliminarDefinitivo',
                        $servicio->id
                    ) }}" method="POST" style="display:inline;">

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn btn-danger btn-sm"
                                                onclick="return confirm('¿Eliminar definitivamente este servicio?')">

                                                ❌ Definitivo

                                            </button>

                                        </form>

                                    </td>

                                </tr>

                @empty

                    <tr>

                        <td colspan="5" class="text-center">

                            No existen servicios eliminados.

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

        $('#tablaEliminados').DataTable({

            dom: 'Bfrtip',

            buttons: [

                'copy',

                'excel',

                'csv',

                'pdf',

                'print'

            ],

            order: [[0, 'desc']],

            language: {

                url: '//cdn.datatables.net/plug-ins/1.13.7/i18n/es-ES.json'

            }

        });

    });

</script>

@stop