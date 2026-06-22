@extends('adminlte::page')

@section('title', 'Detalle Rol')

@section('content_header')

<h1>Detalle Rol</h1>

@stop

@section('content')

<div class="card">

    <div class="card-body">

        <p>

            <b>Nombre:</b>

            {{ $rol->nombre }}

        </p>

        <p>

            <b>Descripción:</b>

            {{ $rol->descripcion }}

        </p>

    </div>

</div>

@stop