@extends('adminlte::page')

@section('title', 'Editar Texto')

@section('content_header')
    <h1>Editar Texto</h1>
@stop

@section('content')

<div class="card">

    <div class="card-header bg-warning">

        <h3 class="card-title">

            Modificar Material Educativo

        </h3>

    </div>

    <div class="card-body">

        @if ($errors->any())

            <div class="alert alert-danger">

                <ul class="mb-0">

                    @foreach ($errors->all() as $error)

                        <li>{{ $error }}</li>

                    @endforeach

                </ul>

            </div>

        @endif

        <form action="{{ route('textos.update', $texto->id) }}"
              method="POST"
              enctype="multipart/form-data">

            @csrf
            @method('PUT')

            <div class="row">

                <div class="col-md-6 mb-3">

                    <label>Categoría</label>

                    <select name="categoria_id"
                            class="form-control"
                            required>

                        @foreach($categorias as $categoria)

                            <option value="{{ $categoria->id }}"
                                {{ $texto->categoria_id == $categoria->id ? 'selected' : '' }}>

                                {{ $categoria->nombre }}

                            </option>

                        @endforeach

                    </select>

                </div>

                <div class="col-md-6 mb-3">

                    <label>Nivel Educativo</label>

                    <select name="nivel_educativo_id"
                            class="form-control"
                            required>

                        @foreach($niveles as $nivel)

                            <option value="{{ $nivel->id }}"
                                {{ $texto->nivel_educativo_id == $nivel->id ? 'selected' : '' }}>

                                {{ $nivel->nombre }}

                            </option>

                        @endforeach

                    </select>

                </div>

            </div>

            <div class="row">

                <div class="col-md-8 mb-3">

                    <label>Título</label>

                    <input type="text"
                           name="titulo"
                           class="form-control"
                           value="{{ $texto->titulo }}"
                           required>

                </div>

                <div class="col-md-4 mb-3">

                    <label>Autor</label>

                    <input type="text"
                           name="autor"
                           class="form-control"
                           value="{{ $texto->autor }}"
                           required>

                </div>

            </div>

            <div class="row">

                <div class="col-md-12 mb-3">

                    <label>Descripción</label>

                    <textarea name="descripcion"
                              rows="4"
                              class="form-control">{{ $texto->descripcion }}</textarea>

                </div>

            </div>

            <div class="row">

                <div class="col-md-12 mb-3">

                    <label>Archivo Actual</label>

                    <br>

                    @if($texto->archivo)

                        <a href="{{ asset('storage/'.$texto->archivo) }}"
                           target="_blank"
                           class="btn btn-info">

                            <i class="fas fa-file-pdf"></i>

                            Ver Archivo

                        </a>

                    @endif

                </div>

            </div>

            <div class="row">

                <div class="col-md-12 mb-3">

                    <label>Reemplazar Archivo (Opcional)</label>

                    <input type="file"
                           name="archivo"
                           class="form-control"
                           accept=".pdf,.doc,.docx,.txt">

                </div>

            </div>

            <hr>

            <button type="submit"
                    class="btn btn-warning">

                <i class="fas fa-save"></i>

                Actualizar

            </button>

            <a href="{{ route('textos.index') }}"
               class="btn btn-secondary">

                Cancelar

            </a>

        </form>

    </div>

</div>

@stop