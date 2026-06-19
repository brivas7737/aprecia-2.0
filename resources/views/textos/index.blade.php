@extends('adminlte::page')

@section('title', 'Textos')

@section('content_header')

<div class="d-flex justify-content-between">

    <h1>Biblioteca de Textos</h1>

    <a href="{{ route('textos.create') }}"
       class="btn btn-success">

        <i class="fas fa-plus"></i>

        Nuevo Texto

    </a>

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

        <table class="table table-bordered table-striped">

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

                        <a href="{{ asset('storage/'.$texto->archivo) }}"
                           target="_blank"
                           class="btn btn-info btn-sm">

                            <i class="fas fa-eye"></i>

                            Ver

                        </a>
                        @endif

                        <a href="{{ route('textos.edit',$texto->id) }}"
                           class="btn btn-warning btn-sm">

                            <i class="fas fa-edit"></i>

                            Editar

                        </a>

                        <form action="{{ route('textos.destroy',$texto->id) }}"
                              method="POST"
                              style="display:inline;">

                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                    class="btn btn-danger btn-sm"
                                    onclick="return confirm('¿Eliminar este texto?')">

                                <i class="fas fa-trash"></i>

                                Eliminar

                            </button>

                        </form>

                    </td>

                </tr>

                @empty

                <tr>

                    <td colspan="7"
                        class="text-center">

                        No existen textos registrados.

                    </td>

                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

@stop