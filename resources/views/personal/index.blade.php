@extends('adminlte::page')

@section('plugins.Datatables', true)

@section('title', 'Personal')

@section('content_header')
<h1>Personal</h1>
@stop

@section('content')

<a href="{{ route('personal.create') }}" class="btn btn-primary mb-3">

    Nuevo Personal
    <a href="{{ route('personal.eliminados') }}" class="btn btn-warning mb-3">

        🗑 Eliminados

    </a>

</a>


@if(session('success'))

    <div class="alert alert-success">
        {{ session('success') }}
    </div>

@endif

<div class="card">

    <div class="card-body">

        <table id="tablaPersonal" class="table table-bordered table-striped">

            <thead>

                <tr>
                    <th>ID</th>
                    <th>Nombre Completo</th>
                    <th>CI</th>
                    <th>Institución</th>
                    <th>Rol</th>
                    <th>Área de Atención</th>
                    <th>Especialidad</th>
                    <th>Años Servicio</th>
                    <th>Teléfono</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>

            </thead>

            <tbody>

                @foreach($personal as $persona)

                                <tr>

                                    <td>{{ $persona->id }}</td>

<td>
    {{ $persona->nombre }}
    {{ $persona->apellido }}
</td>

<td>{{ $persona->ci }}</td>

<td>
    {{ $persona->institucion->nombre ?? '' }}
</td>

<td>
    {{ $persona->rol->nombre ?? '' }}
</td>

<td>
    {{ $persona->areaAtencion->nombre ?? '' }}
</td>

<td>
    {{ $persona->especialidad_certificado }}
</td>

<td>
    {{ $persona->anios_servicio }}
</td>

<td>{{ $persona->telefono }}</td>

<td>

    @if($persona->activo)

        Activo

    @else

        Inactivo

    @endif

</td>

                                    <td>
                                        <a href="{{ route(
                        'personal.ver',
                        $persona->id
                    ) }}" class="btn btn-info btn-sm">

                                            👁️

                                        </a>


                                        <a href="{{ route('personal.edit', $persona->id) }}" class="btn btn-warning btn-sm">

                                            ✏️

                                        </a>

                                        <form action="{{ route('personal.destroy', $persona->id) }}" method="POST"
                                            style="display:inline;">

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn btn-danger btn-sm"
                                                onclick="return confirm('¿Eliminar registro?')">

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

    $(document).ready(function () {

        $('#tablaPersonal').DataTable({

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