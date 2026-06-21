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

@if(session('success'))

<div class="alert alert-success">

    {{ session('success') }}

</div>

@endif

<a href="{{ route('tutores.eliminados') }}"
   class="btn btn-warning mb-3">

    🗑 Eliminados

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

<a href="{{ route('tutores.ver',$tutor->id) }}"
   class="btn btn-info btn-sm">

    👁️

</a>

<a href="{{ route('tutores.edit',$tutor->id) }}"
   class="btn btn-warning btn-sm">

    ✏️

</a>

<form action="{{ route('tutores.destroy',$tutor->id) }}"
      method="POST"
      style="display:inline">

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