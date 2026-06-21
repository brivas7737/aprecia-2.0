@extends('adminlte::page')

@section('title','Paralelos Eliminados')

@section('content_header')

<h1>Paralelos Eliminados</h1>

@stop

@section('content')

@if(session('success'))

<div class="alert alert-success">

    {{ session('success') }}

</div>

@endif

<a href="{{ route('paralelos.index') }}"
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

                @forelse($paralelos as $paralelo)

                <tr>

                    <td>
                        {{ $paralelo->id }}
                    </td>

                    <td>
                        {{ $paralelo->nombre }}
                    </td>

                    <td>
                        {{ $paralelo->descripcion }}
                    </td>

                    <td>
                        {{ $paralelo->deleted_at }}
                    </td>

                    <td>

                        <form
                            action="{{ route(
                                'paralelos.restaurar',
                                $paralelo->id
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

                        No existen paralelos eliminados.

                    </td>

                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

@stop