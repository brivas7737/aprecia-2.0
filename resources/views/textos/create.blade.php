@extends('adminlte::page')

@section('title', 'Nuevo Texto')

@section('content_header') <h1>Registrar Texto</h1>
@stop

@section('content')

@if ($errors->any())

    <div class="alert alert-danger">

        <ul class="mb-0">

            @foreach ($errors->all() as $error)

                <li>{{ $error }}</li>

            @endforeach

        </ul>

    </div>

@endif

<div class="card">
    <div class="card-body">

    <form action="{{ route('textos.store') }}" method="POST" enctype="multipart/form-data">

        @csrf

        <div class="row">

            <div class="col-md-6">
                <label>Categoría</label>
                <select name="categoria_id" class="form-control" required>
                    <option value="">Seleccione...</option>

                    @foreach($categorias as $categoria)
                        <option value="{{ $categoria->id }}">
                            {{ $categoria->nombre }}
                        </option>
                    @endforeach

                </select>
            </div>

            <div class="col-md-6">
                <label>Nivel Educativo</label>
                <select name="nivel_educativo_id" class="form-control" required>
                    <option value="">Seleccione...</option>

                    @foreach($niveles as $nivel)
                        <option value="{{ $nivel->id }}">
                            {{ $nivel->nombre }}
                        </option>
                    @endforeach

                </select>
            </div>

        </div>

        <br>

        <div class="row">

            <div class="col-md-6">
                <label>Título</label>
                <input type="text"
                       name="titulo"
                       class="form-control"
                       required>
            </div>

            <div class="col-md-6">
                <label>Autor</label>
                <input type="text"
                       name="autor"
                       class="form-control"
                       required>
            </div>

        </div>

        <br>

        <div class="form-group">
            <label>Descripción</label>

            <textarea name="descripcion"
                      rows="4"
                      class="form-control"></textarea>
        </div>

        <div class="form-group">
            <label>Archivo</label>

            <input type="file"
                   name="archivo"
                   class="form-control"
                   accept=".pdf,.doc,.docx,.txt"
                   required>
        </div>

        <br>

        <button type="submit" class="btn btn-success">
            Guardar
        </button>

        <a href="{{ route('textos.index') }}"
           class="btn btn-secondary">
            Cancelar
        </a>

    </form>

</div>

</div>

@stop
