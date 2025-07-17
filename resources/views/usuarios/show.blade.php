@extends('layout')

@section('styles')
<style>
    .user-image {
        width: 200px;
        height: 200px;
        object-fit: cover;
        border-radius: 50%;
        border: 5px solid #fff;
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }

    .user-info-card {
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        padding: 30px;
        background-color: #fff;
    }

    .user-title {
        font-size: 2rem;
        font-weight: 700;
        color: #2c3e50;
        margin-bottom: 15px;
    }

    .user-meta {
        display: flex;
        gap: 15px;
        margin-bottom: 20px;
        flex-wrap: wrap;
    }

    .detail-item {
        margin-bottom: 12px;
    }

    .detail-label {
        font-weight: 600;
        color: #7f8c8d;
        display: inline-block;
        width: 150px;
    }

    .detail-value {
        color: #2c3e50;
    }

    .back-btn {
        margin-top: 30px;
    }

    .badge-custom {
        font-size: 0.9rem;
        padding: 8px 15px;
        border-radius: 20px;
        text-transform: uppercase;
        font-weight: 600;
    }

    .product-card {
        transition: transform 0.3s ease;
    }

    .product-card:hover {
        transform: translateY(-5px);
    }

    .product-img {
        height: 180px;
        object-fit: cover;
    }
</style>
@endsection

@section('header')
<div class="container">
    <div class="row">
        <div class="col">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('usuarios.index') }}">Usuarios</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $usuario->nombre }}</li>
                </ol>
            </nav>

            <h2 class="page-title">
                Detalles del Usuario
            </h2>

        </div>
    </div>
</div>
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-4 mb-4 text-center">
            <div class="mb-4">
       @php
    $userImage = $usuario->imagen;
    $isDefault = Str::startsWith($userImage, 'static/avatars/');
@endphp

<img src="{{ asset($isDefault ? $userImage : 'img/usuarios/' . basename($userImage)) }}"
    class="user-image"
    alt="Foto de {{ $usuario->nombre }}"
    onerror="this.src='{{ asset('static/avatars/avatar.jpg') }}'">

            </div>

            <h3 class="user-title">{{ $usuario->nombre }}</h3>

            <div class="user-meta justify-content-center">
                <span class="badge {{ $usuario->estado == 1 ? 'bg-success' : 'bg-danger' }} text-white badge-custom">
                    {{ $usuario->estado == 1 ? 'Activo' : 'Inactivo' }}
                </span>
                <span class="badge bg-info text-white badge-custom">
                    {{ ucfirst($usuario->rol) }}
                </span>
            </div>
        </div>

        <div class="col-lg-8">
            <div class="user-info-card">
                <div class="row">
                    <div class="col-md-6">
                        <div class="detail-item">
                            <span class="detail-label">Email:</span>
                            <span class="detail-value">{{ $usuario->email }}</span>
                        </div>

                        <div class="detail-item">
                            <span class="detail-label">Teléfono:</span>
                            <span class="detail-value">
                                @if($usuario->movil)
                                    {{ $usuario->movil }}
                                @else
                                    <span class="text-muted">No registrado</span>
                                @endif
                            </span>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="detail-item">
                            <span class="detail-label">Ciudad:</span>
                            <span class="detail-value">
                                @if($usuario->ciudad)
                                    {{ $usuario->ciudad->nombre }}
                                @else
                                    <span class="text-muted">No especificada</span>
                                @endif
                            </span>
                        </div>

                        <div class="detail-item">
                            <span class="detail-label">Registrado desde:</span>
                            <span class="detail-value">{{ $usuario->created_at->format('d/m/Y') }}</span>
                        </div>
                    </div>
                </div>

                <div class="d-flex gap-3 mt-4">
                    <a href="{{ route('usuarios.index') }}" class="btn btn-secondary back-btn">
                        <i class="fas fa-arrow-left me-2"></i> Volver al listado
                    </a>

                    @auth
                        @if(auth()->user()->is_admin || auth()->user()->id == $usuario->id)
                            <a href="{{ route('usuarios.edit', $usuario->id) }}" class="btn btn-primary back-btn">
                                <i class="fas fa-edit me-2"></i> Editar
                            </a>
                        @endif
                    @endauth
                </div>
            </div>
        </div>
    </div>

    @if($usuario->productos->count() > 0)
    <div class="row mt-5">
        <div class="col-12">
            <h3 class="mb-4">Productos en venta ({{ $usuario->productos->count() }})</h3>
            <div class="row">
                @foreach($usuario->productos as $producto)
                <div class="col-md-4 mb-4">
                    <div class="card h-100 product-card">
                        @if($producto->imagen)
                            <img src="{{ url('img/productos/' . $producto->imagen) }}" class="card-img-top product-img" alt="{{ $producto->titulo }}">
                        @else
                            <img src="{{ url('img/productos/avatar.png') }}" class="card-img-top product-img" alt="Imagen por defecto">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $producto->titulo }}</h5>
                            <p class="card-text text-success fw-bold">${{ number_format($producto->valor, 2) }}</p>
                            <span class="badge bg-info text-white">{{ ucfirst($producto->estado_producto) }}</span>
                            <span class="badge {{ $producto->estado == 1 ? 'bg-success' : 'bg-danger' }} text-white ms-1">
                                {{ $producto->estado == 1 ? 'Activo' : 'Inactivo' }}
                            </span>
                        </div>
                        <div class="card-footer bg-transparent">
                            <a href="{{ route('productos.show', $producto->id) }}" class="btn btn-sm btn-primary">Ver detalles</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    @else
    <div class="row mt-5">
        <div class="col-12">
            <div class="alert alert-info">
                Este usuario no tiene productos en venta actualmente.
            </div>
        </div>
    </div>
    @endif
</div>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Script para cambiar estado del usuario
        const estadoBadge = document.querySelector('.user-meta .badge.bg-success, .user-meta .badge.bg-danger');

        if(estadoBadge) {
            estadoBadge.addEventListener('click', async function() {
                const usuarioId = {{ $usuario->id }};
                const estadoActual = parseInt({{ $usuario->estado }});
                const nuevoEstado = estadoActual === 1 ? 0 : 1;

                // Mostrar loader
                const originalText = this.textContent;
                this.innerHTML = '<i class="fas fa-spinner fa-spin"></i>';

                try {
                    const response = await fetch(`/usuarios/${usuarioId}/cambiar-estado`, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            'Accept': 'application/json'
                        },
                        body: JSON.stringify({ estado: nuevoEstado })
                    });

                    if (!response.ok) throw new Error('Error en la respuesta');

                    const data = await response.json();

                    if(data.success) {
                        // Actualizar el badge
                        this.classList.remove('bg-success', 'bg-danger');
                        this.classList.add(nuevoEstado === 1 ? 'bg-success' : 'bg-danger');
                        this.textContent = nuevoEstado === 1 ? 'Activo' : 'Inactivo';

                        // Recargar la página para actualizar los productos si es necesario
                        setTimeout(() => location.reload(), 1000);
                    } else {
                        throw new Error(data.message || 'Error al cambiar estado');
                    }
                } catch (error) {
                    console.error('Error:', error);
                    this.textContent = originalText;
                    alert(error.message || 'Error al cambiar el estado');
                }
            });
        }
    });
</script>
@endsection
