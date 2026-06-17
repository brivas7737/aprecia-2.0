@extends('adminlte::page')

@section('title', 'Tutores')

@section('content_header')
<h1>Tutores</h1>
@stop

@section('content')

<a href="{{ route('tutores.create') }}"
   class="btn btn-primary mb-3">

    Nuevo Tutor

</a>

<div class="card">

    <div class="card-body">

        <table class="table table-bordered">

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
                        {{ $tutor->estudiante->nombre }}
                        {{ $tutor->estudiante->apellido }}
                    </td>

                    <td>
                        {{ $tutor->nombre }}
                        {{ $tutor->apellido }}
                    </td>

                    <td>{{ $tutor->ci }}</td>

                    <td>{{ $tutor->telefono }}</td>

                    <td>{{ $tutor->parentesco }}</td>

                    <td>

                        <a href="{{ route('tutores.edit',$tutor->id) }}"
                           class="btn btn-warning btn-sm">
                            Editar
                        </a>

                        <form action="{{ route('tutores.destroy',$tutor->id) }}"
                              method="POST"
                              style="display:inline">

                            @csrf
                            @method('DELETE')

                            <button class="btn btn-danger btn-sm">
                                Eliminar
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