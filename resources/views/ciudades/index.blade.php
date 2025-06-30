@extends('layout')


@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/2.3.2/css/dataTables.dataTables.min.css">

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
        Ciudades

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
            <th scope="col">Nombre</th>
            <th scope="col">Estado</th>
            <th scope="col">Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($data as $ciudad)
            <tr>
                <td>{{ $ciudad->nombre }}</td>
                <td>
                    <span
                        class="badge estado-badge cursor-pointer {{ $ciudad->estado == 1 ? 'bg-green' : 'bg-red' }} text-white"
                        data-id="{{ $ciudad->id }}" data-estado="{{ $ciudad->estado }}" title="Click para cambiar estado">
                        {{ $ciudad->estado == 1 ? 'Activo' : 'Inactivo' }}
                    </span>
                </td>
                <td>
                    <a href="{{ url('ciudades/' . $ciudad->id . '/edit') }}" class="btn btn-default" title="Editar">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            style="color:#3498db; cursor: pointer;">
                            <path d="M12 20h9" />
                            <path d="M16.5 3.5a2.121 2.121 0 1 1 3 3L7 19l-4 1 1-4L16.5 3.5z" />
                        </svg>
                    </a>

                    <form action="{{ route('ciudades.destroy', $ciudad->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-default" title="Eliminar">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                style="color:#e74c3c; cursor: pointer;">
                                <polyline points="3 6 5 6 21 6" />
                                <path
                                    d="M19 6l-1 14a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2L5 6m5 0V4a2 2 0 0 1 2-2h0a2 2 0 0 1 2 2v2" />
                                <line x1="10" y1="11" x2="10" y2="17" />
                                <line x1="14" y1="11" x2="14" y2="17" />
                            </svg>
                        </button>

                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

@stop


@section('modals')
<div class="modal modal-blur fade" id="modal-report" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">

            <form action="{{ URL('ciudades') }}" method="POST" enctype="multipart/form-data" id="form">

                <div class="modal-header">
                    <h5 class="modal-title">Nueva Ciudad</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">

                    @csrf


                    <div class="mb-3">
                        <label class="form-label">Nombre</label>
                        <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Ej: Cali"
                            required autofocus value="{{ old('nombre') }}">
                        @error('nombre')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>





                </div>
                <div class="modal-footer">
                    <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">
                        Cancelar
                    </a>

                    <button class="btn btn-primary ms-auto">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                            stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M12 5l0 14" />
                            <path d="M5 12l14 0" />
                        </svg>
                        Enviar
                    </button>

                </div>
            </form>
        </div>

    </div>
</div>
@stop

@section('scripts')
<script src="//cdn.datatables.net/2.3.2/js/dataTables.min.js"></script>

@if($errors->any())
    <script>
        $(document).ready(function () {
            $('#modal-report').modal('show');
        });
    </script>
@endif
<script>
    $(document).ready(function () {
        $('.table').DataTable({
            "language": {
                "url": "https://cdn.datatables.net/plug-ins/2.3.2/i18n/es-ES.json"
            },
            "order": [[1, 'asc']]
        });
    });
</script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const estadoBadges = document.querySelectorAll('.estado-badge');

    estadoBadges.forEach(badge => {
        badge.addEventListener('click', function() {
            const ciudadId = this.getAttribute('data-id');
            const estadoActual = parseInt(this.getAttribute('data-estado'));
            const nuevoEstado = estadoActual === 1 ? 0 : 1;
            const badge = this;

            // Mostrar loader
            badge.innerHTML = '<i class="fas fa-spinner fa-spin"></i>';

            // Enviar petición AJAX
            fetch(`/ciudades/${ciudadId}/cambiar-estado`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ estado: nuevoEstado })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Actualizar el badge visualmente
                    badge.setAttribute('data-estado', nuevoEstado);
                    badge.classList.toggle('bg-green');
                    badge.classList.toggle('bg-red');
                    badge.textContent = nuevoEstado === 1 ? 'Activo' : 'Inactivo';

                    // Mostrar notificación de éxito
                    Swal.fire({
                        icon: 'success',
                        title: 'Estado actualizado',
                        showConfirmButton: false,
                        timer: 1500
                    });
                } else {
                    badge.textContent = estadoActual === 1 ? 'Activo' : 'Inactivo';
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: data.message || 'No se pudo cambiar el estado'
                    });
                }
            })
            .catch(error => {
                console.error('Error:', error);
                badge.textContent = estadoActual === 1 ? 'Activo' : 'Inactivo';
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Ocurrió un error al cambiar el estado'
                });
            });
        });
    });
});
</script>


@stop
