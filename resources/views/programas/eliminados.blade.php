@extends('adminlte::page')

@section('plugins.Datatables', true)
@section('plugins.DatatablesPlugins', true)

@section('title', 'Programas Eliminados')

@section('content_header')

<h1>Programas Eliminados</h1>

@stop

@section('content')

@if(session('success'))

    <div class="alert alert-success">

        {{ session('success') }}

    </div>

@endif

<a href="{{ route('programas.index') }}" class="btn btn-primary mb-3">

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

                @forelse($programas as $programa)

                                <tr>

                                    <td>{{ $programa->id }}</td>

                                    <td>{{ $programa->nombre }}</td>

                                    <td>{{ $programa->descripcion }}</td>

                                    <td>{{ $programa->deleted_at }}</td>

                                    <td>

                                        <form action="{{ route(
                        'programas.restaurar',
                        $programa->id
                    ) }}" method="POST" style="display:inline;">

                                            @csrf

                                            <button class="btn btn-success btn-sm">

                                                ♻ Restaurar

                                            </button>

                                        </form>

                                        <form action="{{ route(
                        'programas.eliminarDefinitivo',
                        $programa->id
                    ) }}" method="POST" style="display:inline;">

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn btn-danger btn-sm"
                                                onclick="return confirm('¿Eliminar definitivamente este programa?')">

                                                ❌ Definitivo

                                            </button>

                                        </form>

                                    </td>

                                </tr>

                @empty

                    <tr>

                        <td colspan="5" class="text-center">

                            No existen programas eliminados.

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