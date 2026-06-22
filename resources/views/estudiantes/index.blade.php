@extends('adminlte::page')

@section('plugins.Datatables', true)
@section('plugins.DatatablesPlugins', true)

@section('title', 'Estudiantes')

@section('content_header')
    <h1>Estudiantes</h1>
@stop

@section('content')

<a href="{{ route('estudiantes.create') }}"
class="btn btn-primary mb-3">

Nuevo Estudiante

</a>

<a href="{{ route('estudiantes.eliminados') }}"
class="btn btn-warning mb-3">

🗑 Eliminados

</a>


@if(session('success'))

<div class="alert alert-success">
    {{ session('success') }}
</div>

@endif

<div class="card mb-3">

<div class="card-body">

<form method="GET">

<div class="row">

<div class="col-md-3">

<select
name="programa"
class="form-control">

<option value="">
Todos los programas
</option>

@foreach($programas as $programa)

<option
value="{{ $programa->id }}"
{{ request('programa') == $programa->id ? 'selected' : '' }}>

{{ $programa->nombre }}

</option>

@endforeach

</select>

</div>

<div class="col-md-3">

<select
name="servicio"
class="form-control">

<option value="">
Todos los servicios
</option>

@foreach($servicios as $servicio)

<option
value="{{ $servicio->id }}"
{{ request('servicio') == $servicio->id ? 'selected' : '' }}>

{{ $servicio->nombre }}

</option>

@endforeach

</select>

</div>

<div class="col-md-3">

<select
name="paralelo"
class="form-control">

<option value="">
Todos los paralelos
</option>

@foreach($paralelos as $paralelo)

<option
value="{{ $paralelo->id }}"
{{ request('paralelo') == $paralelo->id ? 'selected' : '' }}>

{{ $paralelo->nombre }}

</option>

@endforeach

</select>

</div>

<div class="col-md-3">

<select
name="condicion"
class="form-control">

<option value="">
Todas las condiciones
</option>

@foreach($condiciones as $condicion)

<option
value="{{ $condicion->id }}"
{{ request('condicion') == $condicion->id ? 'selected' : '' }}>

{{ $condicion->nombre }}

</option>

@endforeach

</select>

</div>

<div class="col-md-3">

<button
class="btn btn-primary">

🔍 Filtrar

</button>

<a
href="{{ route('estudiantes.index') }}"
class="btn btn-secondary">

Limpiar

</a>

</div>

</div>

</form>

</div>

</div>

<div class="card">

    <div class="card-body">

        <table
            id="tablaEstudiantes"
            class="table table-bordered table-striped">

            <thead>

                <tr>

                    <th>ID</th>
                    <th>Código</th>
                    <th>Nombre Completo</th>
                    <th>CI</th>
                    <th>RUDEES</th>
                    <th>Programa</th>
                    <th>Servicio</th>
                    <th>Paralelo</th>
                    <th>Institución</th>
                    <th>Nivel Educativo</th>
                    <th>Condición Visual</th>
                    <th>Estado</th>
                    <th>Acciones</th>

                </tr>

            </thead>

            <tbody>

            @foreach($estudiantes as $estudiante)

                <tr>

                    <td>{{ $estudiante->id }}</td>

                    <td>{{ $estudiante->codigo_estudiantil }}</td>

                    <td>
                        {{ $estudiante->nombre }}
                        {{ $estudiante->apellido }}
                    </td>

                    <td>{{ $estudiante->ci }}</td>

                    <td>
    {{ $estudiante->rudees }}
</td>

<td>
    {{ $estudiante->programa->nombre ?? 'No aplica' }}
</td>

<td>
    {{ $estudiante->servicio->nombre ?? 'No aplica' }}
</td>

<td>
    {{ $estudiante->paralelo->nombre ?? '' }}
</td>

                    <td>
                        {{ $estudiante->institucion->nombre ?? '' }}
                    </td>

                    <td>
                        {{ $estudiante->nivelEducativo->nombre ?? '' }}
                    </td>

                    <td>
                        {{ $estudiante->condicionVisual->nombre ?? '' }}
                    </td>

                    <td>

                        @if($estudiante->activo)
                            Activo
                        @else
                            Inactivo
                        @endif

                    </td>

                    <td>

                    <a
href="{{ route(
    'estudiantes.ver',
    $estudiante->id
) }}"
class="btn btn-info btn-sm">

👁️

</a>

                        <a
                            href="{{ route('estudiantes.edit', $estudiante->id) }}"
                            class="btn btn-warning btn-sm">

                            ✏️

                        </a>

                        <form
                            action="{{ route('estudiantes.destroy', $estudiante->id) }}"
                            method="POST"
                            style="display:inline;">

                            @csrf
                            @method('DELETE')

                            <button
                                type="submit"
                                class="btn btn-danger btn-sm"
                                onclick="return confirm('¿Eliminar estudiante?')">

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

    $('#tablaEstudiantes').DataTable({

        dom: 'Bfrtip',

        buttons: [

            'copy',

            'excel',

            'csv',

            'pdf',

            'print'

        ],

        order: [[0, 'asc']],

        language: {

            url: '//cdn.datatables.net/plug-ins/1.13.7/i18n/es-ES.json'

        }

    });

});

</script>

@stop