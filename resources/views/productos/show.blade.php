@extends('layout')

@section('styles')
    <style>
        .product-image {
            width: 100%;
            height: 400px;
            object-fit: cover;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .product-info-card {
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            background-color: #fff;
        }

        .product-title {
            font-size: 2rem;
            font-weight: 700;
            color: #2c3e50;
            margin-bottom: 10px;
        }

        .product-price {
            font-size: 1.8rem;
            font-weight: 700;
            color: #e74c3c;
            margin-bottom: 15px;
        }

        .product-meta {
            display: flex;
            gap: 15px;
            margin-bottom: 20px;
        }

        .product-description {
            font-size: 1rem;
            line-height: 1.6;
            color: #34495e;
            margin-bottom: 25px;
        }

        .detail-item {
            margin-bottom: 10px;
        }

        .detail-label {
            font-weight: 600;
            color: #7f8c8d;
            display: inline-block;
            width: 120px;
        }

        .detail-value {
            color: #2c3e50;
        }

        .back-btn {
            margin-top: 30px;
        }

        .badge-custom {
            font-size: 0.9rem;
            padding: 6px 12px;
            border-radius: 20px;
        }

        .product-price {
            font-size: 40px
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
                        <li class="breadcrumb-item"><a href="{{ route('productos.index') }}">Productos</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $producto->titulo }}</li>
                    </ol>
                </nav>
                <h2 class="page-title">
                    Detalles del Producto
                </h2>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-6 mb-4">
                <div class="product-image-container text-center">
                    @if($producto->imagen)
                        <img src="{{ url('img/productos/' . $producto->imagen) }}" class="product-image"
                            alt="{{ $producto->titulo }}">
                    @else
                        <img src="{{ url('img/productos/avatar.png') }}" class="product-image" alt="Imagen por defecto">
                    @endif
                </div>
            </div>

            <div class="col-lg-6">
                <div class="product-info-card">
                    <h1 class="product-title">{{ $producto->titulo }}</h1>

                    <div class="product-meta">
                        <span class="badge bg-{{ $producto->estado == 1 ? 'success' : 'danger' }} text-white badge-custom">
                            {{ $producto->estado == 1 ? 'Activo' : 'Inactivo' }}
                        </span>
                        <span class="badge bg-info text-white badge-custom">
                            {{ ucfirst($producto->estado_producto) }}
                        </span>
                    </div>

                    <div class="product-price">
                        <div class="mb-3">Precio: $ {{ number_format($producto->valor, 2) }}</div>
                    </div>

                    <div class="product-description">
                        <h5 class="mb-3">Descripción:</h5>
                        <p>{{ $producto->descripcion ?: 'No hay descripción disponible' }}</p>
                    </div>

                    <div class="product-details">
                        <h5 class="mb-3">Detalles del producto:</h5>

                        <div class="detail-item">
                            <span class="detail-label">Categoría:</span>
                            <span class="detail-value">{{ $producto->categoria->nombre }}</span>
                        </div>

                        <div class="detail-item">
                            <span class="detail-label">Vendedor:</span>
                            <span class="detail-value">{{ $producto->usuario->nombre }}</span>
                        </div>

                        <div class="detail-item">
                            <span class="detail-label">Ubicación:</span>
                            <span class="detail-value">{{ $producto->ciudad->nombre }}</span>
                        </div>

                        <div class="detail-item">
                            <span class="detail-label">Fecha creación:</span>
                            <span class="detail-value">{{ $producto->created_at->format('d/m/Y H:i') }}</span>
                        </div>

                        <div class="detail-item">
                            <span class="detail-label">Última actualización:</span>
                            <span class="detail-value">{{ $producto->updated_at->format('d/m/Y H:i') }}</span>
                        </div>
                    </div>

                    <div class="d-flex gap-3 mt-4">
                        <a href="{{ route('productos.index') }}" class="btn btn-secondary back-btn">
                            <i class="fas fa-arrow-left me-2"></i> Volver al listado
                        </a>

                        @auth
                            @if(auth()->user()->id == $producto->usuario_id || auth()->user()->is_admin)
                                <a href="{{ route('productos.edit', $producto->id) }}" class="btn btn-primary back-btn">
                                    <i class="fas fa-edit me-2"></i> Editar
                                </a>

                                <form action="{{ route('productos.destroy', $producto->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger back-btn"
                                        onclick="return confirm('¿Estás seguro de eliminar este producto?')">
                                        <i class="fas fa-trash me-2"></i> Eliminar
                                    </button>
                                </form>
                            @endif
                        @endauth
                    </div>
                </div>
            </div>
        </div>

        @if($productosRelacionados->count() > 0)
            <div class="row mt-5">
                <div class="col-12">
                    <h3 class="mb-4">Productos relacionados</h3>
                    <div class="row">
                        @foreach($productosRelacionados as $relacionado)
                            <div class="col-md-4 mb-4">
                                <div class="card h-100">
                                    @if($relacionado->imagen)
                                        <img src="{{ url('img/productos/' . $relacionado->imagen) }}" class="card-img-top"
                                            alt="{{ $relacionado->titulo }}" style="height: 200px; object-fit: cover;">
                                    @else
                                        <img src="{{ url('img/productos/avatar.png') }}" class="card-img-top" alt="Imagen por defecto"
                                            style="height: 200px; object-fit: cover;">
                                    @endif
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $relacionado->titulo }}</h5>
                                        <p class="card-text text-success fw-bold">${{ number_format($relacionado->valor, 2) }}</p>
                                        <span class="badge bg-info text-white">{{ ucfirst($relacionado->estado_producto) }}</span>
                                    </div>
                                    <div class="card-footer bg-transparent">
                                        <a href="{{ route('productos.show', $relacionado->id) }}" class="btn btn-sm btn-primary">Ver
                                            detalles</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection

@section('scripts')
    <script>
        // Puedes agregar scripts adicionales aquí si necesitas
        // Por ejemplo, para un carrusel de imágenes o zoom en la imagen principal
        document.addEventListener('DOMContentLoaded', function () {
            // Ejemplo: Zoom en la imagen al hacer clic
            const productImage = document.querySelector('.product-image');
            if (productImage) {
                productImage.addEventListener('click', function () {
                    this.classList.toggle('zoomed');
                });
            }
        });
    </script>
@endsection