@extends('adminlte::page')

@section('title', 'Detalle Área')

@section('content_header')

<h1>Detalle Área de Atención</h1>

@stop

@section('content')

<div class="card">

    <div class="card-body">

        <p>

            <b>Nombre:</b>

            {{ $area->nombre }}

        </p>

        <p>

            <b>Descripción:</b>

            {{ $area->descripcion }}

        </p>

    </div>

</div>

@stop