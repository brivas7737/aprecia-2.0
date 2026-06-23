@extends('adminlte::page')

@section('plugins.Datatables', true)
@section('plugins.DatatablesPlugins', true)

@section('title', 'Textos')

@section('content_header')

<div class="d-flex justify-content-between">

    <h1>Biblioteca de Textos</h1>

    <div>

        <a href="{{ route('textos.create') }}" class="btn btn-success">

            <i class="fas fa-plus"></i>

            Nuevo Texto

        </a>

        <a href="{{ route('textos.eliminados') }}" class="btn btn-warning">

            🗑 Eliminados

        </a>

    </div>

    <div class="card mt-3">

        <div class="card-body">

            <form method="GET">

                <div class="row">

                    <div class="col-md-3">

                        <select name="categoria" class="form-control">

                            <option value="">

                                Todas las categorías

                            </option>

                            @foreach($categorias as $categoria)

                                <option value="{{ $categoria->id }}" {{ request('categoria') == $categoria->id ? 'selected' : '' }}>

                                    {{ $categoria->nombre }}

                                </option>

                            @endforeach

                        </select>

                    </div>

                    <div class="col-md-3">

                        <select name="nivel" class="form-control">

                            <option value="">

                                Todos los niveles

                            </option>

                            @foreach($niveles as $nivel)

                                <option value="{{ $nivel->id }}" {{ request('nivel') == $nivel->id ? 'selected' : '' }}>

                                    {{ $nivel->nombre }}

                                </option>

                            @endforeach

                        </select>

                    </div>

                    <div class="col-md-2">

                        <input type="text" name="titulo" class="form-control" placeholder="Título"
                            value="{{ request('titulo') }}">

                    </div>

                    <div class="col-md-2">

                        <input type="text" name="autor" class="form-control" placeholder="Autor"
                            value="{{ request('autor') }}">

                    </div>

                    <div class="col-md-2">

                        <button class="btn btn-primary">

                            🔍 Buscar

                        </button>

                        <a href="{{ route('textos.index') }}" class="btn btn-secondary">

                            Limpiar

                        </a>

                    </div>

                </div>

            </form>

        </div>

    </div>

</div>

@stop

@section('content')

@if(session('success'))

    <div class="alert alert-success">

        {{ session('success') }}

    </div>

@endif

<div class="card">

    <div class="card-header">

        <h3 class="card-title">

            Materiales Registrados

        </h3>

    </div>

    <div class="card-body">

        <table id="tablaTextos" class="table table-bordered table-striped">

            <thead>

                <tr>

                    <th>ID</th>

                    <th>Título</th>

                    <th>Categoría</th>

                    <th>Nivel</th>

                    <th>Autor</th>

                    <th>Formato</th>

                    <th width="250">Acciones</th>

                </tr>

            </thead>

            <tbody>

                @forelse($textos as $texto)

                    <tr>

                        <td>

                            {{ $texto->id }}

                        </td>

                        <td>

                            {{ $texto->titulo }}

                        </td>

                        <td>

                            {{ $texto->categoria->nombre ?? 'N/A' }}

                        </td>

                        <td>

                            {{ $texto->nivelEducativo->nombre ?? 'N/A' }}

                        </td>

                        <td>

                            {{ $texto->autor }}

                        </td>

                        <td>

                            {{ strtoupper($texto->formato) }}

                        </td>

                        <td>

                            @if($texto->archivo)

                                <a href="{{ asset('storage/' . $texto->archivo) }}" target="_blank" class="btn btn-info btn-sm">

                                    <i class="fas fa-eye"></i>



                                </a>
                            @endif

                            <a href="{{ route('textos.edit', $texto->id) }}" class="btn btn-warning btn-sm">

                                <i class="fas fa-edit"></i>



                            </a>

                            <form action="{{ route('textos.destroy', $texto->id) }}" method="POST" style="display:inline;">

                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('¿Eliminar este texto?')">

                                    <i class="fas fa-trash"></i>



                                </button>

                            </form>

                            <a href="{{ route('textos.generarAudio', $texto->id) }}" class="btn btn-success btn-sm">
                                <i class="fas fa-volume-up"></i>

                            </a>

<a href="{{ route(
    'braille.generar',
    $texto->id
) }}"
class="btn btn-secondary btn-sm">

    ⠿

</a>

</a>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="7" class="text-center">

                            No existen textos registrados.

                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

@section('js')

<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>

<script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>

<script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>

<script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js"></script>

<script>

    $(document).ready(function () {

        $('#tablaTextos').DataTable({

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

@stop