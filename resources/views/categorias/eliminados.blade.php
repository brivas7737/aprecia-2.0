@extends('adminlte::page')

@section('title', 'Categorías Eliminadas')

@section('content_header')

<h1>Categorías Eliminadas</h1>

@stop

@section('content')

<a href="{{ route('categorias.index') }}" class="btn btn-primary mb-3">

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

                @forelse($categorias as $categoria)

                                <tr>

                                    <td>{{ $categoria->id }}</td>

                                    <td>{{ $categoria->nombre }}</td>

                                    <td>

                                        <form action="{{ route(
                        'categorias.restaurar',
                        $categoria->id
                    ) }}" method="POST">

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

                            No existen categorías eliminadas.

                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

@stop