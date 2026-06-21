@extends('adminlte::page')

@section('title','Estudiantes Eliminados')

@section('content_header')

<h1>Estudiantes Eliminados</h1>

@stop

@section('content')

@if(session('success'))

<div class="alert alert-success">

    {{ session('success') }}

</div>

@endif

<div class="card">

    <div class="card-body">

        <table class="table table-bordered">

            <thead>

                <tr>

                    <th>ID</th>

                    <th>Código</th>

                    <th>Nombre Completo</th>

                    <th>CI</th>

                    <th>Fecha Eliminación</th>

                    <th>Acción</th>

                </tr>

            </thead>

            <tbody>

                @forelse($estudiantes as $estudiante)

                <tr>

                    <td>
                        {{ $estudiante->id }}
                    </td>

                    <td>
                        {{ $estudiante->codigo_estudiantil }}
                    </td>

                    <td>
                        {{ $estudiante->nombre }}
                        {{ $estudiante->apellido }}
                    </td>

                    <td>
                        {{ $estudiante->ci }}
                    </td>

                    <td>
                        {{ $estudiante->deleted_at }}
                    </td>

                    <td>

                        <form
                            action="{{ route(
                                'estudiantes.restaurar',
                                $estudiante->id
                            ) }}"
                            method="POST">

                            @csrf

                            <button
                                class="btn btn-success btn-sm">

                                ↩ Restaurar

                            </button>

                        </form>

                    </td>

                </tr>

                @empty

                <tr>

                    <td colspan="6"
                        class="text-center">

                        No existen estudiantes eliminados.

                    </td>

                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

@stop