@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>APRECIA 2.0</h1>
@stop

@section('content')

<div class="row">

    <div class="col-lg-3 col-6">
        <div class="small-box bg-info">
            <div class="inner">
                <h3>{{ $totalEstudiantes }}</h3>
                <p>Estudiantes</p>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-6">
        <div class="small-box bg-success">
            <div class="inner">
                <h3>{{ $totalTextos }}</h3>
                <p>Textos</p>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-6">
        <div class="small-box bg-warning">
            <div class="inner">
                <h3>{{ $totalInstituciones }}</h3>
                <p>Instituciones</p>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-6">
        <div class="small-box bg-danger">
            <div class="inner">
                <h3>{{ $totalPersonal }}</h3>
                <p>Personal</p>
            </div>
        </div>
    </div>

</div>

<div class="row">

    <div class="col-lg-3 col-6">
        <div class="small-box bg-primary">
            <div class="inner">
                <h3>{{ $totalDocentes }}</h3>
                <p>Docentes</p>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-6">
        <div class="small-box bg-secondary">
            <div class="inner">
                <h3>{{ $totalTutores }}</h3>
                <p>Tutores</p>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-6">
        <div class="small-box bg-dark">
            <div class="inner">
                <h3>{{ $totalCategorias }}</h3>
                <p>Categorías</p>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-6">
        <div class="small-box bg-danger">
            <div class="inner">
                <h3>{{ $totalAudios }}</h3>
                <p>Audios</p>
            </div>
        </div>
    </div>

</div>

<div class="row">

    <div class="col-md-4">

        <div class="card">

            <div class="card-header">

                <h3 class="card-title">

                    Últimos Estudiantes

                </h3>

            </div>

            <div class="card-body">

                <ul>

                    @forelse($ultimosEstudiantes as $estudiante)

                        <li>

                            {{ $estudiante->nombre }}
                            {{ $estudiante->apellido }}

                        </li>

                    @empty

                        <li>No existen registros</li>

                    @endforelse

                </ul>

            </div>

        </div>

    </div>

    <div class="col-md-4">

        <div class="card">

            <div class="card-header">

                <h3 class="card-title">

                    Últimos Tutores

                </h3>

            </div>

            <div class="card-body">

                <ul>

                    @forelse($ultimosTutores as $tutor)

                        <li>

                            {{ $tutor->nombre }}
                            {{ $tutor->apellido }}

                        </li>

                    @empty

                        <li>No existen registros</li>

                    @endforelse

                </ul>

            </div>

        </div>

    </div>

    <div class="col-md-4">

        <div class="card">

            <div class="card-header">

                <h3 class="card-title">

                    Últimos Textos

                </h3>

            </div>

            <div class="card-body">

                <ul>

                    @forelse($ultimosTextos as $texto)

                        <li>

                            {{ $texto->titulo }}

                        </li>

                    @empty

                        <li>No existen registros</li>

                    @endforelse

                </ul>

            </div>

        </div>

    </div>

</div>

<div class="card">

    <div class="card-header">

        <h3 class="card-title">

            Estudiantes por Programa

        </h3>

    </div>

    <div class="card-body">

        <div style="height:350px;">

            <canvas id="graficoProgramas"></canvas>

        </div>

    </div>

</div>

<div class="card">

    <div class="card-header">

        <h3 class="card-title">

            Estudiantes por Condición Visual

        </h3>

    </div>

    <div class="card-body">

        <div style="height:350px;">

            <canvas id="graficoCondiciones"></canvas>

        </div>

    </div>

</div>

<div class="card">

    <div class="card-header">

        <h3 class="card-title">

            Textos por Categoría

        </h3>

    </div>

    <div class="card-body">

        <div style="height:350px;">

            <canvas id="graficoCategorias"></canvas>

        </div>

    </div>

</div>

<div class="card">

    <div class="card-header">

        <h3 class="card-title">

            Bienvenido

        </h3>

    </div>

    <div class="card-body">

        Sistema APRECIA 2.0 para la gestión de estudiantes con discapacidad visual.

    </div>

</div>

@section('js')

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>

const programas = @json(
    $programasGrafico->pluck('nombre')
);

const cantidades = @json(
    $programasGrafico->pluck('estudiantes_count')
);

new Chart(
    document.getElementById('graficoProgramas'),
    {
        type: 'bar',
        data: {
            labels: programas,
            datasets: [{
                label: 'Estudiantes',
                data: cantidades
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false
        }
    }
);

const condiciones = @json(
    $condicionesGrafico->pluck('nombre')
);

const cantidadesCondiciones = @json(
    $condicionesGrafico->pluck('estudiantes_count')
);

new Chart(
    document.getElementById('graficoCondiciones'),
    {
        type: 'doughnut',
        data: {
            labels: condiciones,
            datasets: [{
                data: cantidadesCondiciones
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false
        }
    }
);

const categorias = @json(
    $categoriasGrafico->pluck('nombre')
);

const textosPorCategoria = @json(
    $categoriasGrafico->pluck('textos_count')
);

new Chart(
    document.getElementById('graficoCategorias'),
    {
        type: 'bar',
        data: {
            labels: categorias,
            datasets: [{
                label: 'Textos',
                data: textosPorCategoria
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false
        }
    }
);

</script>

@stop

@stop