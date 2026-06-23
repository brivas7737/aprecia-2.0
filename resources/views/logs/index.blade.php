@extends('adminlte::page')

@section('plugins.Datatables', true)
@section('plugins.DatatablesPlugins', true)

@section('title', 'Logs del Sistema')

@section('content_header')

<h1>Logs del Sistema</h1>

@stop

@section('content')

<div class="card">

    <div class="card-body">

    <div class="card mb-3">

    <div class="card-body">

        <form method="GET">

            <div class="row">

                <div class="col-md-4">

                    <select
                        name="accion"
                        class="form-control">

                        <option value="">
                            Todas las acciones
                        </option>

                        <option value="CREAR"
                            {{ request('accion') == 'CREAR' ? 'selected' : '' }}>
                            CREAR
                        </option>

                        <option value="EDITAR"
                            {{ request('accion') == 'EDITAR' ? 'selected' : '' }}>
                            EDITAR
                        </option>

                        <option value="ELIMINAR"
                            {{ request('accion') == 'ELIMINAR' ? 'selected' : '' }}>
                            ELIMINAR
                        </option>

                        <option value="RESTAURAR"
                            {{ request('accion') == 'RESTAURAR' ? 'selected' : '' }}>
                            RESTAURAR
                        </option>

                        <option value="GENERAR AUDIO"
                            {{ request('accion') == 'GENERAR AUDIO' ? 'selected' : '' }}>
                            GENERAR AUDIO
                        </option>

                    </select>

                </div>

                <div class="col-md-4">

<select
    name="modulo"
    class="form-control">

    <option value="">
        Todos los módulos
    </option>

    <option value="ESTUDIANTES"
        {{ request('modulo') == 'ESTUDIANTES' ? 'selected' : '' }}>
        ESTUDIANTES
    </option>

    <option value="TUTORES"
        {{ request('modulo') == 'TUTORES' ? 'selected' : '' }}>
        TUTORES
    </option>

    <option value="INSTITUCIONES"
        {{ request('modulo') == 'INSTITUCIONES' ? 'selected' : '' }}>
        INSTITUCIONES
    </option>

    <option value="PERSONAL"
        {{ request('modulo') == 'PERSONAL' ? 'selected' : '' }}>
        PERSONAL
    </option>

    <option value="TEXTOS"
        {{ request('modulo') == 'TEXTOS' ? 'selected' : '' }}>
        TEXTOS
    </option>

    <option value="CATEGORIAS"
        {{ request('modulo') == 'CATEGORIAS' ? 'selected' : '' }}>
        CATEGORIAS
    </option>

    <option value="PROGRAMAS"
        {{ request('modulo') == 'PROGRAMAS' ? 'selected' : '' }}>
        PROGRAMAS
    </option>

    <option value="SERVICIOS"
        {{ request('modulo') == 'SERVICIOS' ? 'selected' : '' }}>
        SERVICIOS
    </option>

    <option value="PARALELOS"
        {{ request('modulo') == 'PARALELOS' ? 'selected' : '' }}>
        PARALELOS
    </option>

    <option value="NIVELES EDUCATIVOS"
        {{ request('modulo') == 'NIVELES EDUCATIVOS' ? 'selected' : '' }}>
        NIVELES EDUCATIVOS
    </option>

    <option value="CONDICIONES VISUALES"
        {{ request('modulo') == 'CONDICIONES VISUALES' ? 'selected' : '' }}>
        CONDICIONES VISUALES
    </option>

    <option value="AREAS DE ATENCION"
        {{ request('modulo') == 'AREAS DE ATENCION' ? 'selected' : '' }}>
        AREAS DE ATENCION
    </option>

    <option value="ROLES"
        {{ request('modulo') == 'ROLES' ? 'selected' : '' }}>
        ROLES
    </option>

</select>
                </div>

                <div class="col-md-4">

                    <button
                        class="btn btn-primary">

                        Buscar

                    </button>

                    <a href="{{ route('logs.index') }}"
                       class="btn btn-secondary">

                        Limpiar

                    </a>

                </div>

            </div>

        </form>

    </div>

</div>

        <table id="tablaLogs" class="table table-bordered table-striped">

            <thead>

                <tr>

                    <th>ID</th>

                    <th>Usuario</th>

                    <th>Acción</th>

                    <th>Módulo</th>

                    <th>Descripción</th>

                    <th>Fecha</th>

                </tr>

            </thead>

            <tbody>

                @foreach($logs as $log)

                    <tr>

                        <td>{{ $log->id }}</td>

                        <td>

                            {{ $log->user->name ?? 'Sin usuario' }}

                        </td>

                        <td>{{ $log->accion }}</td>

                        <td>{{ $log->modulo }}</td>

                        <td>{{ $log->descripcion }}</td>

                        <td>{{ $log->fecha_hora }}</td>

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

        $('#tablaLogs').DataTable({

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