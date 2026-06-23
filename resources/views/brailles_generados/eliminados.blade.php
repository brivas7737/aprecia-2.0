@extends('adminlte::page')

@section('title', 'Brailles Eliminados')

@section('plugins.Datatables', true)
@section('plugins.DatatablesPlugins', true)

@section('content_header')

<h1>Brailles Eliminados</h1>

@stop

@section('content')

<a href="{{ route('brailles-generados.index') }}"
   class="btn btn-primary mb-3">

    Volver

</a>

<div class="card">

    <div class="card-body">

        <table
            id="tablaBraillesEliminados"
            class="table table-bordered table-striped">

            <thead>

                <tr>

                    <th>ID</th>

                    <th>Texto</th>

                    <th>Archivo</th>

                    <th>Fecha</th>

                    <th>Acción</th>

                </tr>

            </thead>

            <tbody>

                @forelse($brailles as $braille)

                <tr>

                    <td>

                        {{ $braille->id }}

                    </td>

                    <td>

                        {{ $braille->texto->titulo ?? 'N/A' }}

                    </td>

                    <td>

                        {{ basename($braille->archivo_brf) }}

                    </td>

                    <td>

                        {{ $braille->fecha_generacion }}

                    </td>

                    <td>

                        <form
                            action="{{ route(
                                'braille.restaurar',
                                $braille->id
                            ) }}"
                            method="POST"
                            style="display:inline;">

                            @csrf

                            <button
                                class="btn btn-success btn-sm">

                                ↩ Restaurar

                            </button>

                        </form>

                        <form
                            action="{{ route(
                                'braille.eliminarDefinitivo',
                                $braille->id
                            ) }}"
                            method="POST"
                            style="display:inline;">

                            @csrf
                            @method('DELETE')

                            <button
                                class="btn btn-danger btn-sm">

                                🗑 Definitivo

                            </button>

                        </form>

                    </td>

                </tr>

                @empty

                <tr>

                    <td
                        colspan="5"
                        class="text-center">

                        No existen brailles eliminados.

                    </td>

                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

@stop

@section('js')

<script>

$(document).ready(function() {

    $('#tablaBraillesEliminados').DataTable({

        language: {

            url: '//cdn.datatables.net/plug-ins/1.13.7/i18n/es-ES.json'

        }

    });

});

</script>

@stop