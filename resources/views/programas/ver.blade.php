@extends('adminlte::page')

@section('title','Detalle Programa')

@section('content_header')

<h1>Detalle Programa</h1>

@stop

@section('content')

<div class="card">

    <div class="card-body">

        <p>

            <b>Nombre:</b>

            {{ $programa->nombre }}

        </p>

        <p>

            <b>Descripción:</b>

            {{ $programa->descripcion }}

        </p>

    </div>

</div>

@stop