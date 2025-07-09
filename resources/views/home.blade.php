@extends('layout')


@section('styles')
<link rel="stylesheet" href="{{ url('css/lightbox.min.css') }}">
<style>
    .error {
        color: red;
        font-size: 0.875em;
        margin-top: 10px;
    }

    .img-category {
        width: 32px;
        height: 32px;
        object-fit: cover;
        border-radius: 50px;
        border: 1px solid #ddd;
        box-shadow: 2px 2px 5px;
    }
</style>
@stop

@section('header')
<div class="col">

    <h2 class="page-title">
        Bienvenido {{ Auth::user()->nombre }} a tu paner de Control

    </h2>
    <small class="text-muted">Rol {{ Auth::user()->rol}}</small>

</div>
@stop

@section('content')

<div class="row mb-4">
    @foreach([
        ['title' => 'Productos', 'value' => $estadisticas['productos'], 'color' => 'primary'],
        ['title' => 'Usuarios', 'value' => $estadisticas['usuarios'], 'color' => 'success'],
        ['title' => 'Comentarios', 'value' => $estadisticas['comentarios'], 'color' => 'warning'],
        ['title' => 'Categorías', 'value' => $estadisticas['categorias'], 'color' => 'info'],
    ] as $card)
    <div class="col-md-3">
        <div class="card text-white bg-{{ $card['color'] }} shadow mb-3">
            <div class="card-body">
                <h5 class="card-title">{{ $card['title'] }}</h5>
                <p class="card-text display-6">{{ $card['value'] }}</p>
            </div>
        </div>
    </div>
    @endforeach
</div>

<div class="row">
    <div class="col-md-6 mb-4">
        <div class="card shadow">
            <div class="card-body">
                <h5 class="card-title">Productos Activos/Inactivos</h5>
                <canvas id="graficoEstadoProductos"></canvas>
            </div>
        </div>
    </div>

    <div class="col-md-6 mb-4">
        <div class="card shadow">
            <div class="card-body">
                <h5 class="card-title">Productos por Categoría</h5>
                <canvas id="graficoPorCategoria"></canvas>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Productos activos/inactivos
    new Chart(document.getElementById('graficoEstadoProductos'), {
        type: 'doughnut',
        data: {
            labels: ['Activos', 'Inactivos'],
            datasets: [{
                data: [{{ $estadisticas['productos_activos'] }}, {{ $estadisticas['productos_inactivos'] }}],
                backgroundColor: ['#28a745', '#dc3545'],
            }]
        }
    });

    // Productos por categoría
    new Chart(document.getElementById('graficoPorCategoria'), {
        type: 'bar',
        data: {
            labels: {!! json_encode($productosPorCategoria->pluck('nombre')) !!},
            datasets: [{
                label: 'Cantidad de productos',
                data: {!! json_encode($productosPorCategoria->pluck('productos_count')) !!},
                backgroundColor: '#007bff'
            }]
        },
        options: {
            scales: {
                y: { beginAtZero: true }
            }
        }
    });


</script>

@stop


