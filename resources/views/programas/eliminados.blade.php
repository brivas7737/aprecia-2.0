@extends('adminlte::page')

@section('title','Programas Eliminados')

@section('content_header')

<h1>Programas Eliminados</h1>

@stop

@section('content')

@if(session('success'))

<div class="alert alert-success">

    {{ session('success') }}

</div>

@endif

<a href="{{ route('programas.index') }}"
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

                @forelse($programas as $programa)

                <tr>

                    <td>
                        {{ $programa->id }}
                    </td>

                    <td>
                        {{ $programa->nombre }}
                    </td>

                    <td>
                        {{ $programa->descripcion }}
                    </td>

                    <td>
                        {{ $programa->deleted_at }}
                    </td>

                    <td>

                        <form
                            action="{{ route(
                                'programas.restaurar',
                                $programa->id
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

                        No existen programas eliminados.

                    </td>

                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

@stop