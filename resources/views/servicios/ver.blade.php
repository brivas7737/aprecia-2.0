@extends('adminlte::page')

@section('title','Detalle Servicio')

@section('content_header')

<h1>Detalle Servicio</h1>

@stop

@section('content')

<div class="card">

    <div class="card-body">

        <p>

            <b>Nombre:</b>

            {{ $servicio->nombre }}

        </p>

        <p>

            <b>Descripción:</b>

            {{ $servicio->descripcion }}

        </p>

    </div>

</div>

@stop