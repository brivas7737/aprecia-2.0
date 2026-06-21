@extends('adminlte::page')

@section('title','Servicios Eliminados')

@section('content_header')

<h1>Servicios Eliminados</h1>

@stop

@section('content')

@if(session('success'))

<div class="alert alert-success">

    {{ session('success') }}

</div>

@endif

<a href="{{ route('servicios.index') }}"
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

                @forelse($servicios as $servicio)

                <tr>

                    <td>
                        {{ $servicio->id }}
                    </td>

                    <td>
                        {{ $servicio->nombre }}
                    </td>

                    <td>
                        {{ $servicio->descripcion }}
                    </td>

                    <td>
                        {{ $servicio->deleted_at }}
                    </td>

                    <td>

                        <form
                            action="{{ route(
                                'servicios.restaurar',
                                $servicio->id
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

                        No existen servicios eliminados.

                    </td>

                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

@stop