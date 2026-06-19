@extends('adminlte::page')

@section('title','Audios Generados')

@section('content_header')

<div class="d-flex justify-content-between">

    <h1>Audios Generados</h1>

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

                    <th>Audio</th>

                </tr>

            </thead>

            <tbody>

                @forelse($audios as $audio)

                <tr>

                    <td>
                        {{ $audio->id }}
                    </td>

                    <td>
                        {{ $audio->texto->titulo ?? 'N/A' }}
                    </td>

                    <td>
                        {{ $audio->voz->nombre ?? 'N/A' }}
                    </td>

                    <td>
                        {{ $audio->fecha_generacion }}
                    </td>

                    <td>

    @php

        $nombreAudio = basename($audio->archivo_audio);

    @endphp

    <audio controls preload="none">

        <source
            src="{{ asset('storage/audios/'.$nombreAudio) }}"
            type="audio/mpeg">

    </audio>

</td>

                </tr>

                @empty

                <tr>

                    <td colspan="5"
                        class="text-center">

                        No existen audios generados.

                    </td>

                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

@stop