@extends('layout')

@section('styles')
<link rel="stylesheet" href="{{ url('css/lightbox.min.css') }}">
<link rel="stylesheet" href="https://cdn.datatables.net/2.3.2/css/dataTables.dataTables.min.css">
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

    table.ui.celled.table,
    table.ui.celled.table th,
    table.ui.celled.table td {
        border: 1px solid #dee2e6 !important;
    }

    table.ui.celled.table {
        border-collapse: collapse !important;
    }
</style>
@stop
@section('header')
<div class="col">

    <h2 class="page-title">
        Comentarios

    </h2>
</div>
<!-- Page title actions -->
<div class="col-auto ms-auto d-print-none">
    <div class="btn-list">

        <a href="#" class="btn btn-primary d-none d-sm-inline-block" data-bs-toggle="modal"
            data-bs-target="#modal-report">
            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M12 5l0 14" />
                <path d="M5 12l14 0" />
            </svg>
            Nuevo
        </a>

    </div>
</div>
@stop

@section('content')

<table class="ui celled table">


    <thead>
        <tr>
            <th scope="col">Producto</th>
            <th scope="col">Descripción</th>
            <th scope="col">Valoración</th>
            <th scope="col">Estado</th>
            <th scope="col">Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($data as $comentario)
        <tr>
            <td>{{ $comentario->producto->titulo }}</td>
            <td>{{ $comentario->descripcion }}</td>
            <td>{{ $comentario->valoracion }}</td>
            <td>
                @if($comentario->estado==1)
                <span class="badge bg-green text-white">Activo</span>
                @else
                <span class="badge bg-red text-white">Inactivo</span>
                @endif

            </td>
            <td>
                <a href="{{ route('categorias.edit', $comentario->id) }}" class="ui button">Editar</a>
                <form action="{{ route('categorias.destroy', $comentario->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="ui button red">Eliminar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@stop

@section('scripts')

<script src="//cdn.datatables.net/2.3.2/js/dataTables.min.js"></script>




<script>
    $(document).ready(function() {
        $('.table').DataTable({
            "language": {
                "url": "https://cdn.datatables.net/plug-ins/2.3.2/i18n/es-ES.json"
            },
            "order": [[1, 'asc']]
        });
    });
</script>


@stop

