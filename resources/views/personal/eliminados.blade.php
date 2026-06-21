@extends('adminlte::page')

@section('title','Programas Eliminados')

@section('content_header')

<h1>Personal Eliminados</h1>

@stop

@section('content')

@if(session('success'))

<div class="alert alert-success">

    {{ session('success') }}

</div>

@endif

<a href="{{ route('personal.index') }}"
   class="btn btn-primary mb-3">

    Volver

</a>

<div class="card">

    <div class="card-body">

        <table class="table table-bordered">

            <thead>

                <tr>

                    <th>ID</th>

                    <th>Nombre</th>

                    <th>Descripción</th>

                    <th>Fecha Eliminación</th>

                    <th>Acción</th>

                </tr>

            </thead>

            <tbody>

                @forelse($personal as $persona)

                <tr>

                    <td>
                        {{ $persona->id }}
                    </td>

                    <td>
                        {{ $persona->nombre }} {{ $persona->apellido }}
                    </td>

                    <td>
                        {{ $persona->ci }}
                    </td>

                    <td>
                        {{ $persona->deleted_at }}
                    </td>

                    <td>

                        <form
                            action="{{ route(
                                'personal.restaurar',
                                $persona->id
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

                    <td colspan="5"
                        class="text-center">

                        No existe personal eliminado.

                    </td>

                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

@stop