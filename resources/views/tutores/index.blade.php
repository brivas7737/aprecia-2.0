@extends('adminlte::page')

@section('title', 'Tutores')

@section('content_header')
<h1>Tutores</h1>
@stop

@section('content')

<a href="{{ route('tutores.create') }}" class="btn btn-primary mb-3">

    Nuevo Tutor

</a>

@if(session('success'))

    <div class="alert alert-success">

        {{ session('success') }}

    </div>

@endif

<a href="{{ route('tutores.eliminados') }}" class="btn btn-warning mb-3">

    🗑 Eliminados

</a>

<div class="card">

    <div class="card-body">

        <table id="tablaTutores" class="table table-bordered">

            <thead>
                <tr>
                    <th>ID</th>
                    <th>Estudiante</th>
                    <th>Nombre</th>
                    <th>CI</th>
                    <th>Teléfono</th>
                    <th>Parentesco</th>
                    <th>Acciones</th>
                </tr>
            </thead>

            <tbody>

                @foreach($tutores as $tutor)

                    <tr>

                        <td>{{ $tutor->id }}</td>

                        <td>

                            @if($tutor->estudiante)

                                {{ $tutor->estudiante->nombre }}
                                {{ $tutor->estudiante->apellido }}

                            @else

                                Sin estudiante asociado

                            @endif

                        </td>

                        <td>
                            {{ $tutor->nombre }}
                            {{ $tutor->apellido }}
                        </td>

                        <td>{{ $tutor->ci }}</td>

                        <td>{{ $tutor->telefono }}</td>

                        <td>{{ $tutor->parentesco }}</td>

                        <td>

                            <a href="{{ route('tutores.ver', $tutor->id) }}" class="btn btn-info btn-sm">

                                👁️

                            </a>

                            <a href="{{ route('tutores.edit', $tutor->id) }}" class="btn btn-warning btn-sm">

                                ✏️

                            </a>

                            <form action="{{ route('tutores.destroy', $tutor->id) }}" method="POST" style="display:inline">

                                @csrf
                                @method('DELETE')

                                <button class="btn btn-danger btn-sm">

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

        $('#tablaTutores').DataTable({

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