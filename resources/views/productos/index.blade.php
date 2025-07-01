@extends('layout')

@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<link rel="stylesheet" href="{{ url('css/lightbox.min.css') }}">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
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

    .select2-container {
        z-index: 9999 !important;
    }

    .col-descripcion {
        width: 200px;
        max-width: 200px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    table.ui.celled.table,
    table.ui.celled.table th,
    table.ui.celled.table td {
        border: 1px solid #dee2e6 !important;
    }

    table.ui.celled.table {
        border-collapse: collapse !important;
    }

    .cursor-pointer {
        cursor: pointer;
    }

    .estado-badge:hover {
        opacity: 0.8;
    }

    .swal2-container select {
    display: none !important;
}

</style>
@stop

@section('header')
<div class="col">
    <h2 class="page-title">
        Productos
    </h2>
</div>
<div class="col-auto ms-auto d-print-none">
    <div class="btn-list">
        <a href="#" class="btn btn-primary d-none d-sm-inline-block" data-bs-toggle="modal"
            data-bs-target="#modal-report">
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
            <th scope="col">Imagen</th>
            <th scope="col">Titulo</th>
            <th scope="col">Slug</th>
            <th scope="col" class="col-descripcion">Descripción</th>
            <th scope="col">Valor</th>
            <th scope="col">Estado Producto</th>
            <th scope="col">Estado</th>
            <th scope="col">Ver +</th>
            <th scope="col">Acciones</th>

        </tr>
    </thead>
    <tbody>
        @foreach ($data as $producto)
            <tr>
                <td>
                    @if ($producto->imagen)
                        <a href="{{ url('img/productos/' . $producto->imagen) }}" data-lightbox="{{ $producto->nombre }}"
                            data-title="{{ $producto->nombre }}">
                            <img src="{{ url('img/productos/' . $producto->imagen) }}" class="img-category">
                        </a>
                    @else
                        <a href="{{ url('img/productos/avatar.png') }}" data-lightbox="{{ $producto->nombre }}"
                            data-title="{{ $producto->nombre }}">
                            <img src="{{ url('img/productos/avatar.png') }}" class="img-category">
                        </a>
                    @endif
                </td>
                <td>{{ $producto->titulo }}</td>
                <td>{{ $producto->slug }}</td>
                <td class="col-descripcion" title="{{ $producto->descripcion }}">
                    {{ $producto->descripcion }}
                </td>
                <td>{{ number_format($producto->valor, 2) }}</td>
                <td>{{ $producto->estado_producto }}</td>

                <td>
                    <span
                        class="badge estado-badge cursor-pointer {{ $producto->estado == 1 ? 'bg-green' : 'bg-red' }} text-white"
                        data-id="{{ $producto->id }}" data-estado="{{ $producto->estado }}"
                        title="Click para cambiar estado">
                        {{ $producto->estado == 1 ? 'Activo' : 'Inactivo' }}
                    </span>
                </td>

                <td>
                    <a href="{{ route('productos.show', $producto->id) }}" class="btn btn-default" title="Ver más">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            style="color:#2ecc71; cursor: pointer;">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                            <path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6" />
                        </svg>
                    </a>
                <td>
                    <a href="{{ url('productos/' . $producto->id . '/edit') }}" class="btn btn-default" title="Editar">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            style="color:#3498db; cursor: pointer;">
                            <path d="M12 20h9" />
                            <path d="M16.5 3.5a2.121 2.121 0 1 1 3 3L7 19l-4 1 1-4L16.5 3.5z" />
                        </svg>
                    </a>

                    <form action="{{ route('productos.destroy', $producto->id) }}" method="POST" style="display: inline;">
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
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@stop

@section('modals')
@php
    $categorias = \App\Models\Categoria::all();
    $ciudades = \App\Models\Ciudad::all();
    $usuarios = \App\Models\Usuario::all();
@endphp

<div class="modal modal-blur fade" id="modal-report" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form action="{{ route('productos.store') }}" method="POST" enctype="multipart/form-data" id="form">
                <div class="modal-header">
                    <h5 class="modal-title">Nuevo Producto</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    @csrf

                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="mb-3">
                        <label class="form-label">Titulo</label>
                        <input type="text" class="form-control" name="titulo" id="titulo"
                            placeholder="Ej: Nombre del producto" required autofocus value="{{ old('titulo') }}">
                        @error('titulo')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <div>
                                <label class="form-label">Slug</label>
                                <input type="text" class="form-control" id="slug" name="slug" required
                                    value="{{ old('slug') }}">
                                @error('slug')
                                    <div class="error">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <div>
                                <label class="form-label">Imagen</label>
                                <input type="file" class="form-control" name="imagen" accept="image/*">
                                @error('imagen')
                                    <div class="error">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <div>
                                <label class="form-label">Valor</label>
                                <input type="number" step="0.01" class="form-control" name="valor" required
                                    value="{{ old('valor') }}">
                                @error('valor')
                                    <div class="error">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <div>
                                <label class="form-label">Estado del producto</label>
                                <select class="form-control" name="estado_producto" required>
                                    <option value="nuevo" {{ old('estado_producto') == 'nuevo' ? 'selected' : '' }}>Nuevo
                                    </option>
                                    <option value="poco uso" {{ old('estado_producto') == 'poco uso' ? 'selected' : '' }}>
                                        Poco uso</option>
                                    <option value="usado" {{ old('estado_producto') == 'usado' ? 'selected' : '' }}>Usado
                                    </option>
                                </select>
                                @error('estado_producto')
                                    <div class="error">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Categoría</label>
                            <select class="form-control" name="categoria_id" required>
                                <option value="">Seleccionar</option>
                                @foreach($categorias as $categoria)
                                                            <option value="{{ $categoria->id }}" {{ old('categoria_id') == $categoria->id ? 'selected'
                                    : '' }}>
                                                                {{ $categoria->nombre }}
                                                            </option>
                                @endforeach
                            </select>
                            @error('categoria_id')
                                <div class="error">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-4 mb-3">
                            <label class="form-label">Usuario</label>
                            <select class="form-control" name="usuario_id" required>
                                <option value="">Seleccionar</option>
                                @foreach($usuarios as $usuario)
                                    <option value="{{ $usuario->id }}" {{ old('usuario_id') == $usuario->id ? 'selected' : ''
                                            }}>
                                        {{ $usuario->nombre }}
                                    </option>
                                @endforeach
                            </select>
                            @error('usuario_id')
                                <div class="error">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-4 mb-3">
                            <label class="form-label">Ciudad</label>
                            <select class="form-control" name="ciudad_id" required>
                                <option value="">Seleccionar</option>
                                @foreach($ciudades as $ciudad)
                                    <option value="{{ $ciudad->id }}" {{ old('ciudad_id') == $ciudad->id ? 'selected' : '' }}>
                                        {{ $ciudad->nombre }}
                                    </option>
                                @endforeach
                            </select>
                            @error('ciudad_id')
                                <div class="error">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-12 mb-3">
                        <div>
                            <label class="form-label">Descripción</label>
                            <textarea class="form-control" rows="3"
                                name="descripcion">{{ old('descripcion') }}</textarea>
                            @error('descripcion')
                                <div class="error">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="modal-footer">
                        <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">
                            Cancelar
                        </a>

                        <button type="submit" class="btn btn-primary ms-auto">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M12 5l0 14" />
                                <path d="M5 12l14 0" />
                            </svg>
                            Guardar
                        </button>
                    </div>
            </form>
        </div>
    </div>
</div>
@stop

@section('scripts')

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="//cdn.datatables.net/2.3.2/js/dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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

<script>
    $(document).ready(function () {
        // Asignar clase select2 a los selects del formulario
        $('select.form-control').addClass('select2');

        // Inicializar select2 solo a los que tengan esa clase
        $('.select2').select2({
            dropdownParent: $('#modal-report'),
            width: '100%'
        });

        @if($errors->any())
            $('#modal-report').modal('show');
        @endif

        document.getElementById('titulo').addEventListener('input', function (e) {
            const titulo = e.target.value;
            const slug = generateSlug(titulo);
            document.getElementById('slug').value = slug;
        });

        function generateSlug(text) {
            return text
                .toString()
                .toLowerCase()
                .normalize('NFD')
                .replace(/[\u0300-\u036f]/g, '')
                .replace(/\s+/g, '-')
                .replace(/[^\w\-]+/g, '')
                .replace(/\-\-+/g, '-')
                .replace(/^-+/, '')
                .replace(/-+$/, '');
        }

        // Manejador de estados con fetch y badge
        const estadoBadges = document.querySelectorAll('.estado-badge');
        estadoBadges.forEach(badge => {
            badge.addEventListener('click', function () {
                const productoId = this.getAttribute('data-id');
                const estadoActual = parseInt(this.getAttribute('data-estado'));
                const nuevoEstado = estadoActual === 1 ? 0 : 1;
                const badge = this;

                badge.innerHTML = '<i class="fas fa-spinner fa-spin"></i>';

                fetch(`/productos/${productoId}/cambiar-estado`, {
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
                        badge.setAttribute('data-estado', nuevoEstado);
                        badge.classList.toggle('bg-green');
                        badge.classList.toggle('bg-red');
                        badge.textContent = nuevoEstado === 1 ? 'Activo' : 'Inactivo';

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

@if (session('message') && in_array(session('type'), ['success', 'warning', 'error']))
    <script>
        // Cerrar cualquier select2 antes de abrir sweetalert
        $('.select2').select2('close');

        Swal.fire({
            title: '{{ session("type") == "success" ? "Éxito" : (session("type") == "warning" ? "Advertencia" : "Error") }}',
            text: '{{ session("message") }}',
            icon: '{{ session("type") }}',
            confirmButtonText: 'Aceptar'
        });
    </script>
@endif

@stop

