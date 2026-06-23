@extends('adminlte::page')

@section('title', 'Visualizar Braille')

@section('content_header')

<h1>Visualizar Contenido Braille</h1>

@stop

@section('content')

<div class="card">

    <div class="card-header">

        <h3>

            {{ $braille->texto->titulo ?? 'Texto' }}

        </h3>

    </div>

    <div class="card-body">

        <textarea
            class="form-control"
            rows="20"
            readonly>{{ $braille->contenido_texto }}</textarea>

    </div>

</div>

@stop