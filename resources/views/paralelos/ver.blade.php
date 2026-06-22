@extends('adminlte::page')

@section('title','Detalle Paralelo')

@section('content_header')

<h1>Detalle Paralelo</h1>

@stop

@section('content')

<div class="card">

    <div class="card-body">

        <p>

            <b>Nombre:</b>

            {{ $paralelo->nombre }}

        </p>

        <p>

            <b>Descripción:</b>

            {{ $paralelo->descripcion }}

        </p>

    </div>

</div>

@stop