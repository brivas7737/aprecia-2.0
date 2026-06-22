@extends('adminlte::page')

@section('title', 'Roles Eliminados')

@section('content_header')

<h1>Roles Eliminados</h1>

@stop

@section('content')

<a href="{{ route('roles.index') }}" class="btn btn-primary mb-3">

    Volver

</a>

<div class="card">

    <div class="card-body">

        <table class="table table-bordered">

            <thead>

                <tr>

                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Acción</th>

                </tr>

            </thead>

            <tbody>

                @forelse($roles as $rol)

                    <tr>

                        <td>{{ $rol->id }}</td>

                        <td>{{ $rol->nombre }}</td>

                        <td>

                            <form action="{{ route('roles.restaurar', $rol->id) }}" method="POST">

                                @csrf

                                <button class="btn btn-success btn-sm">

                                    ↩ Restaurar

                                </button>

                            </form>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="3">

                            No existen roles eliminados.

                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

@stop