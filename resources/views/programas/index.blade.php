@extends('adminlte::page')

@section('plugins.Datatables', true)
@section('plugins.DatatablesPlugins', true)

@section('title', 'Programas')

@section('content_header')
    <h1>Programas</h1>
@stop

@section('content')

<a href="{{ route('programas.create') }}" class="btn btn-primary mb-3">
    Nuevo Programa
</a>

<a
href="{{ route('programas.eliminados') }}"
class="btn btn-warning mb-3">

🗑 Eliminados

</a>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<div class="card">
    <div class="card-body">

        <table id="tablaProgramas" class="table table-bordered table-striped">

            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Acciones</th>
                </tr>
            </thead>

            <tbody>

            @foreach($programas as $programa)

                <tr>

                    <td>{{ $programa->id }}</td>

                    <td>{{ $programa->nombre }}</td>

                    <td>{{ $programa->descripcion }}</td>

                   <td>

    <a href="{{ route('programas.ver',$programa->id) }}"
       class="btn btn-info btn-sm">

        👁️

    </a>

    <a href="{{ route('programas.edit',$programa->id) }}"
       class="btn btn-warning btn-sm">

        ✏️

    </a>

    <form action="{{ route('programas.destroy',$programa->id) }}"
          method="POST"
          style="display:inline;">

        @csrf
        @method('DELETE')

        <button
            type="submit"
            class="btn btn-danger btn-sm"
            onclick="return confirm('¿Eliminar programa?')">

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

$('#tablaProgramas').DataTable({

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