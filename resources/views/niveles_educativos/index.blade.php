@extends('adminlte::page')

@section('plugins.Datatables', true)
@section('plugins.DatatablesPlugins', true)

@section('title', 'Niveles Educativos')

@section('content_header')
    <h1>Niveles Educativos</h1>
@stop

@section('content')

<a href="{{ route('niveles-educativos.create') }}" class="btn btn-primary mb-3">
    Nuevo Nivel Educativo
</a>

<a href="{{ route('niveles-educativos.eliminados') }}"
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

        <table id="tablaNiveles" class="table table-bordered table-striped">

            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Acciones</th>
                </tr>
            </thead>

            <tbody>

            @foreach($niveles as $nivel)

                <tr>

                    <td>{{ $nivel->id }}</td>

                    <td>{{ $nivel->nombre }}</td>

                    <td>{{ $nivel->descripcion }}</td>

                    <td>

<a href="{{ route('niveles-educativos.ver',$nivel->id) }}"
class="btn btn-info btn-sm">

👁️

</a>

<a href="{{ route('niveles-educativos.edit',$nivel->id) }}"
class="btn btn-warning btn-sm">

✏️

</a>

<form
action="{{ route('niveles-educativos.destroy',$nivel->id) }}"
method="POST"
style="display:inline;">

@csrf
@method('DELETE')

<button
type="submit"
class="btn btn-danger btn-sm">

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

$('#tablaNiveles').DataTable({

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