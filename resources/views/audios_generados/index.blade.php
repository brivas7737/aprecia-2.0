@extends('adminlte::page')

@section('title', 'Audios Generados')

@section('content_header')

<div class="d-flex justify-content-between">

    <div class="d-flex justify-content-between">

        <h1>Audios Generados</h1>

        <a href="{{ route('audios-generados.eliminados') }}" class="btn btn-warning">

            🗑 Eliminados

        </a>

    </div>

</div>

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

                    <th>Texto</th>

                    <th>Voz</th>

                    <th>Fecha</th>

                    <th>Reproducciones</th>

                    <th>Audio</th>

                    <th>Acciones</th>

                </tr>

            </thead>

            <tbody>

                @forelse($audios as $audio)

                                <tr>

                                    <td>{{ $audio->id }}</td>

                                    <td>{{ $audio->texto->titulo ?? 'N/A' }}</td>

                                    <td>{{ $audio->voz->nombre ?? 'N/A' }}</td>

                                    <td>{{ $audio->fecha_generacion }}</td>

                                    <td>{{ $audio->reproducciones }}</td>

                                    <td>

                                        @php
                                            $nombreAudio = basename($audio->archivo_audio);
                                        @endphp

                                        <audio controls preload="none" onplay="registrarReproduccion({{ $audio->id }})">

                                            <source src="{{ asset('storage/audios/' . $nombreAudio) }}" type="audio/mpeg">

                                        </audio>

                                    </td>

                                    <td>

                                        <a href="{{ route(
                        'audios-generados.descargar',
                        $audio->id
                    ) }}" class="btn btn-success btn-sm">

                                            ⬇

                                        </a>

                                        <form action="{{ route(
                        'audios-generados.destroy',
                        $audio->id
                    ) }}" method="POST" style="display:inline;">

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn btn-danger btn-sm">

                                                🗑

                                            </button>

                                        </form>

                                    </td>

                                </tr>

                @empty

                    <tr>

                        <td colspan="7" class="text-center">

                            No existen audios generados.

                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

@section('js')

<script>

    function registrarReproduccion(id) {
        fetch(
            '/audios-generados/' + id + '/reproducir',
            {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN':
                        '{{ csrf_token() }}'
                }
            }
        );
    }

</script>

@stop

@stop