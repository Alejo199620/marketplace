<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Marketplace Detalles del producto</title>
    <link href="https://fonts.googleapis.com/css?family=Cairo:400,600,700&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:600&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400i,700i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Ubuntu&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <link rel="shortcut icon" type="image/x-icon" href="/assets/images/favicon.png" />
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/css/animate.min.css">
    <link rel="stylesheet" href="/assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="/assets/css/nice-select.css">
    <link rel="stylesheet" href="/assets/css/slick.min.css">
    <link rel="stylesheet" href="/assets/css/style.css">
    <link rel="stylesheet" href="/assets/css/main-color.css">
    <link rel="stylesheet" href="/assets/css/styles_detalle_producto.css">


</head>


<body class="biolife-body">

    <!-- Preloader -->
    <div id="biof-loading">
        <div class="biof-loading-center">
            <div class="biof-loading-center-absolute">
                <div class="dot dot-one"></div>
                <div class="dot dot-two"></div>
                <div class="dot dot-three"></div>
            </div>
        </div>
    </div>

    <!-- HEADER -->
    <header id="header" class="header-area style-01 layout-03">
        <div class="header-top bg-main hidden-xs">
            <div class="container">
                <div class="top-bar left">
                    <ul class="horizontal-menu">
                        <li><a href="#"><i class="fa fa-envelope" aria-hidden="true"></i>Marketplace@gmail.com</a>
                        </li>

                    </ul>
                </div>
                <div class="top-bar right">
                    <ul class="social-list">
                        <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>



                    </ul>



                </div>
            </div>
        </div>
        <div class="header-middle biolife-sticky-object ">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-2 col-md-6 col-xs-6">
                        <a href="{{ url('market') }}" class="biolife-logo"><img src="/static/logoini.png" alt="logo"
                                width="200" height="60"></a>
                    </div>



                    <div class="col-lg-9 col-md-8 padding-top-2px">
                        <div class="header-search-bar layout-01">
                            <form action="#" class="form-search" name="desktop-seacrh" method="get">
                                <input type="text" name="s" class="input-text" id="buscador-productos"
                                    placeholder="Busca en marketplace.." autocomplete="off" autofocus>

                                <div id="sugerencias"
                                    style="position: absolute; background: white; z-index: 999; width: 100%; display: none;">
                                </div>

                                <button type="submit" class="btn-submit"><i
                                        class="biolife-icon icon-search"></i></button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </header>




    <!--Navigation section-->
    <div class="container">
        <nav class="biolife-nav">
            <ul>
                <li class="nav-item">
                    <a href="javascript:history.back()" class="permal-link">
                        <i class="fas fa-arrow-left"></i> Inicio
                    </a>
                </li>
            </ul>
        </nav>
    </div>
    <div class="page-contain single-product">

        <div class="container">

            <!-- Main content -->
            <div id="main-content" class="main-content">

                <!-- summary info -->
                <div class="sumary-product single-layout">
                    <div class="media">
                        <ul class="biolife-carousel slider-for"
                            data-slick='{"rows":1,"arrows":true,"dots":false,"infinite":false,"speed":400,"slidesMargin":0,"slidesToShow":1}'>
                            @if (isset($producto->imagen))
                                <li class="item"
                                    style="width: 400px; height: 400px; display: flex; justify-content: center; align-items: center; background: #f8f9fa;">
                                    <img src="{{ url('/img/productos/' . ($producto->imagen ?? 'sin_foto.avif')) }}"
                                        alt="{{ $producto->titulo }}"
                                        style="width: 400px; height: 400px; object-fit: contain; background-color: white;">

                                </li>
                            @else
                                <li class="item"
                                    style="width: 400px; height: 400px; display: flex; justify-content: center; align-items: center; background: #f8f9fa;">
                                    <img src="{{ url('/img/productos/sin_foto.avif') }}" alt="{{ $producto->titulo }}"
                                        style="width: 400px; height: 400px; object-fit: contain; background-color: white;">
                                </li>
                            @endif
                        </ul>
                    </div>

                    <div class="product-attribute">
                        <h3 class="title">{{ $producto->titulo }}</h3>
                        <div class="rating" style="font-size: 1.5rem; color: #f1c40f;">
                            @php
                                $rounded = round($promedioValoracion * 2) / 2;
                            @endphp

                            @for ($i = 1; $i <= 5; $i++)
                                @if ($rounded >= $i)
                                    <i class="fas fa-star"></i>
                                @elseif ($rounded == $i - 0.5)
                                    <i class="fas fa-star-half-alt"></i>
                                @else
                                    <i class="far fa-star"></i>
                                @endif
                            @endfor

                            <small
                                style="font-size: 0.9rem; color: #555;">({{ number_format($promedioValoracion, 1) }})</small>
                        </div>


                        <div class="detail-item">
                            <span class="detail-label">Descripción:</span>

                            <p class="excerpt">{{ $producto->descripcion }}</p>
                        </div>

                        <div class="detail-item">
                            <span class="detail-label">Valor:</span>
                            <div class="price">
                                <ins>
                                    <span class="price-amount" style="color: red; font-size: 45px;">
                                        <span class="currencySymbol">$</span>{{ number_format($producto->valor, 2) }}
                                    </span>
                                </ins>
                            </div>
                        </div>


                    </div>



                    <div class="action-form">
                        <div class="seller-details compact">
                            <h4 class="seller-title">Vendedor(a)</h4>

                            <!-- Contenedor de la imagen centrada -->
                            <div class="seller-avatar-container"
                                style="display: flex; justify-content: center; margin: 10px 0;">
                                @php
                                    $userImage = $producto->usuario->imagen;
                                    $isDefault = Str::startsWith($userImage, 'static/avatars/');
                                @endphp
                                <img src="{{ asset($isDefault ? $userImage : 'img/usuarios/' . basename($userImage)) }}"
                                    class="seller-avatar" alt="Foto de {{ $producto->usuario->nombre }}"
                                    style="width: 80px; height: 80px; border-radius: 50%; object-fit: cover; border: 2px solid #eaeaea;"
                                    onerror="this.src='{{ asset('static/avatars/avatar.jpg') }}'">
                            </div>

                            <!-- Nombre del vendedor -->
                            <div class="seller-name"
                                style="text-align: center; font-size: 1.1em; font-weight: 600; margin-bottom: 15px;">
                                {{ $producto->usuario->nombre }}
                            </div>

                            <!-- Información de contacto -->
                            <div class="seller-info list-view">
                                <div class="info-item">
                                    <i class="fas fa-map-marker-alt"></i>
                                    <span>{{ $producto->ciudad->nombre }}</span>
                                </div>
                                <div class="info-item">
                                    <i class="fas fa-phone"></i>
                                    <span>{{ $producto->usuario->movil }}</span>
                                </div>
                                <div class="info-item">
                                    <i class="fas fa-envelope"></i>
                                    <span>{{ $producto->usuario->email }}</span>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>



            <div class="comentarios-y-formulario"
                style="display: flex; justify-content: center; align-items: flex-start; gap: 30px; padding: 40px 0; flex-wrap: wrap;">

                {{-- Sección de comentarios --}}
                @php
                    $comentarios = \App\Models\Comentario::where('producto_id', $producto->id)
                        ->where('estado', 1)
                        ->orderBy('created_at', 'desc')
                        ->get();
                @endphp

                <div class="comentarios-wrapper" style="flex: 1; min-width: 300px; max-width: 500px;">
                    <h3
                        style="font-size: 24px; font-weight: bold; margin-bottom: 15px; color: #2c3e50; text-align: center;">
                        Comentarios de clientes
                    </h3>

                    <div class="comentarios-scrollbox">
                        @if ($comentarios->count() > 0)
                            @foreach ($comentarios as $comentario)
                                @php
                                    $lines = explode("\n", $comentario->descripcion);
                                    $nombre = str_replace('Nombre: ', '', $lines[0] ?? 'Anónimo');
                                    $email = str_replace('Email: ', '', $lines[1] ?? '');
                                    $texto = str_replace('Comentario: ', '', $lines[2] ?? '');
                                @endphp

                                <div class="comentario-item"
                                    style="margin-bottom: 20px; background: #f9f9f9; padding: 15px; border-radius: 10px;">
                                    <div class="comentario-header"
                                        style="display: flex; justify-content: space-between; align-items: center;">
                                        <strong>{{ $nombre }}</strong>
                                        <div class="rating">
                                            @for ($i = 1; $i <= 5; $i++)
                                                <i class="fa fa-star"
                                                    style="color: {{ $i <= $comentario->valoracion ? '#f39c12' : '#ccc' }};"></i>
                                            @endfor
                                        </div>
                                    </div>
                                    <p class="comentario-text" style="margin: 10px 0;">{{ $texto }}</p>
                                    <small class="comentario-fecha"
                                        style="color: #777;">{{ $comentario->created_at->format('d/m/Y H:i') }}</small>
                                </div>
                            @endforeach
                        @else
                            <p style="color: #888; text-align: center; font-style: italic;">No hay comentarios aún. Sé
                                el primero en opinar.</p>
                        @endif
                    </div>
                </div>

                {{-- Comentarios nuevos --}}
                <div class="review-form-wrapper"
                    style="flex: 1; min-width: 300px; max-width: 500px; margin-top: 80px;">
                    <div
                        style="background-color: #e6f0ff; padding: 2rem; border-radius: 12px; box-shadow: 0 0 8px rgba(0,0,0,0.1);">
                        <h4 class="title mb-4" style="text-align: center; font-size: 30px;     font-weight: bold;">
                            Envía tu reseña</h4>

                        <form action="{{ route('guardar.comentario') }}" method="POST" id="comment-form"
                            style="display: flex; flex-direction: column; gap: 1rem;">
                            @csrf

                            {{-- Valoración con estrellas --}}
                            <div class="comment-form-rating">
                                <label class="mb-2 d-block fw-bold" style ="font-size: 18px; font-weight: bold;">1. Tu
                                    valoración de este producto:</label>
                                <div class="rating-stars" style="font-size: 1.5rem; color: #ccc; cursor: pointer;">
                                    <input type="hidden" name="valoracion" id="rating-value" value="4">
                                    @for ($i = 1; $i <= 5; $i++)
                                        <i class="fa fa-star rating-star {{ $i <= 4 ? 'checked' : '' }}"
                                            data-rating="{{ $i }}" style="margin-right: 5px;"></i>
                                    @endfor
                                </div>
                            </div>

                            {{-- Nombre --}}
                            <div>
                                <input type="text" name="nombre" placeholder="Tu nombre" class="form-control"
                                    required>
                            </div>

                            {{-- Email --}}
                            <div>
                                <input type="email" name="email" placeholder="Tu email" class="form-control"
                                    required>
                            </div>

                            {{-- Comentario --}}
                            <div>
                                <textarea name="comentario" rows="4" placeholder="Escribe tu comentario..." class="form-control" required></textarea>
                            </div>

                            <input type="hidden" name="producto_id" value="{{ $producto->id }}">

                            {{-- Botón --}}
                            <div style="margin-top: 1.5rem; text-align: center;">
                                <button type="submit"
                                    style="padding: 0.75rem 2rem; font-size: 2.2rem; font-weight: bold; background-color: #003366; color: white; border: none; border-radius: 8px;">
                                    Enviar comentario
                                </button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>





        </div>
    </div>

    <!-- related products -->
    <div class="product-related-box single-layout">
        <div class="biolife-title-box lg-margin-bottom-26px-im">

            <h3 class="main-title">Productos Relacionados</h3>
        </div>
        <ul class="products-list biolife-carousel nav-center-02 nav-none-on-mobile"
            data-slick='{"rows":1,"arrows":true,"dots":false,"infinite":false,"speed":400,"slidesMargin":0,"slidesToShow":5, "responsive":[{"breakpoint":1200, "settings":{ "slidesToShow": 4}},{"breakpoint":992, "settings":{ "slidesToShow": 3, "slidesMargin":20 }},{"breakpoint":768, "settings":{ "slidesToShow": 2, "slidesMargin":10}}]}'>

            @foreach ($productosRelacionados as $producto)
                <li class="product-item">
                    <div class="contain-product layout-default">
                        <div class="product-thumb">
                            <a href="{{ route('producto.info', ['id' => $producto->id]) }}" class="link-to-product">
                                @if (isset($producto->imagen))
                                    <img src="{{ url('/img/productos/' . $producto->imagen) }}"
                                        alt="{{ $producto->titulo }}" width="270" height="270"
                                        class="product-thumnail">
                                @else
                                    <img src="{{ url('/img/productos/sin_foto.avif') }}"
                                        alt="{{ $producto->titulo }}" width="270" height="270"
                                        class="product-thumnail">
                                @endif
                            </a>
                        </div>
                        <div class="info">
                            <b class="categories">{{ $producto->categoria->nombre }}</b>
                            <h4 class="product-title"><a href="{{ route('producto.info', ['id' => $producto->id]) }}"
                                    class="pr-name">{{ $producto->titulo }}</a></h4>
                            <div class="price">
                                <ins><span class="price-amount"><span
                                            class="currencySymbol">$</span>{{ number_format($producto->valor, 2) }}</span></ins>
                            </div>
                            <div class="slide-down-box">
                                <p class="message">{{ $producto->descripcion }}</p>

                            </div>
                        </div>
                    </div>
                </li>
            @endforeach

        </ul>
    </div>



    </div>

    <!-- FOOTER -->
    <footer id="footer" class="footer layout-03">
        <!-- Sección principal -->
        <div class="footer-main" style="background-color: #182433; color: #ffffff;" class="py-5">
            <div class="container">
                <div class="row justify-content-center text-center text-lg-start">

                    <!-- Columna: Logo y contacto -->
                    <div class="col-lg-4 mb-4">
                        <a href="{{ url('/market') }}" class="d-inline-block mb-3">
                            <img src="/static/logo.png" alt="Marketplace Colombia" width="200" height="60">
                        </a>
                        <p class="small">Conectamos compradores y vendedores en toda Colombia. Plataforma segura y
                            fácil para comerciar productos.</p>
                        <ul class="list-unstyled small mt-3">
                            <li class="mb-2"><i class="fas fa-phone-alt me-2"></i> (+57) 317 716 6103</li>
                            <li><i class="fas fa-envelope me-2"></i> marketplace@gmail.com</li>
                        </ul>
                    </div>

                    <!-- Columna: Enlaces Marketplace -->
                    <div class="col-lg-2 col-md-4 mb-4">
                        <h6 class="text-uppercase fw-bold mb-3">Marketplace</h6>
                        <ul class="list-unstyled small">
                            <li><a href="#" class="text-light text-decoration-none">Explorar productos</a></li>
                            <li><a href="#" class="text-light text-decoration-none">Cómo vender</a></li>
                            <li><a href="#" class="text-light text-decoration-none">Cómo comprar</a></li>
                            <li><a href="#" class="text-light text-decoration-none">Categorías</a></li>
                            <li><a href="#" class="text-light text-decoration-none">Vendedores destacados</a>
                            </li>
                        </ul>
                    </div>

                    <!-- Columna: Mi Cuenta -->
                    <div class="col-lg-2 col-md-4 mb-4">
                        <h6 class="text-uppercase fw-bold mb-3">Mi cuenta</h6>
                        <ul class="list-unstyled small">
                            <li><a href="#" class="text-light text-decoration-none">Mis compras</a></li>
                            <li><a href="#" class="text-light text-decoration-none">Mis ventas</a></li>
                            <li><a href="#" class="text-light text-decoration-none">Favoritos</a></li>
                            <li><a href="#" class="text-light text-decoration-none">Mensajes</a></li>
                            <li><a href="#" class="text-light text-decoration-none">Configuración</a></li>
                        </ul>
                    </div>

                    <!-- Columna: Legal y redes -->
                    <div class="col-lg-4 col-md-8 mb-4">
                        <h6 class="text-uppercase fw-bold mb-3">Legal</h6>
                        <ul class="list-inline small">
                            <li class="list-inline-item me-3">
                                <a href="#" class="text-light text-decoration-none">
                                    <i class="fas fa-file-contract me-1"></i> Términos
                                </a>
                            </li>
                            <li class="list-inline-item me-3">
                                <a href="#" class="text-light text-decoration-none">
                                    <i class="fas fa-user-shield me-1"></i> Privacidad
                                </a>
                            </li>
                            <li class="list-inline-item me-3">
                                <a href="#" class="text-light text-decoration-none">
                                    <i class="fas fa-undo-alt me-1"></i> Devoluciones
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#" class="text-light text-decoration-none">
                                    <i class="fas fa-shield-alt me-1"></i> Protección
                                </a>
                            </li>
                        </ul>

                        <h6 class="text-uppercase fw-bold mt-4 mb-2">Síguenos</h6>
                        <div class="d-flex justify-content-center justify-content-lg-start gap-3 fs-5">
                            <a href="#" class="text-light"><i class="fab fa-facebook-f"></i></a>
                            <a href="#" class="text-light"><i class="fab fa-instagram"></i></a>
                            <a href="#" class="text-light"><i class="fab fa-twitter"></i></a>
                            <a href="#" class="text-light"><i class="fab fa-youtube"></i></a>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <!-- Sección inferior -->
        <div class="footer-bottom bg-light py-3 border-top text-center">
            <div class="container">
                <div class="d-flex flex-column flex-md-row justify-content-between align-items-center">
                    <div class="mb-2 mb-md-0">
                        <span>Métodos de pago:</span>
                        <img src="/assets/images/card1.jpg" alt="Visa" width="40">
                        <img src="/assets/images/card2.jpg" alt="Mastercard" width="40">
                        <img src="/assets/images/card3.jpg" alt="PayPal" width="40">
                        <img src="/assets/images/card4.jpg" alt="Nequi" width="40">
                        <img src="/assets/images/card5.jpg" alt="Daviplata" width="40">
                    </div>
                    <div>
                        <p class="mb-0">&copy; 2025 Marketplace Colombia. Todos los derechos reservados.</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>


    <!-- Scroll Top Button -->
    <a class="btn-scroll-top"><i class="biolife-icon icon-left-arrow"></i></a>

    <script src="/assets/js/jquery-3.4.1.min.js"></script>
    <script src="/assets/js/bootstrap.min.js"></script>
    <script src="/assets/js/jquery.countdown.min.js"></script>
    <script src="/assets/js/jquery.nice-select.min.js"></script>
    <script src="/assets/js/jquery.nicescroll.min.js"></script>
    <script src="/assets/js/slick.min.js"></script>
    <script src="/assets/js/biolife.framework.js"></script>
    <script src="/assets/js/functions.js"></script>

    <script>
        document.querySelectorAll('.rating-star').forEach(star => {
            star.addEventListener('click', function() {
                const rating = this.getAttribute('data-rating');
                document.getElementById('rating-value').value = rating;

                document.querySelectorAll('.rating-star').forEach(s => {
                    s.classList.remove('checked');
                });

                for (let i = 1; i <= rating; i++) {
                    document.querySelector(`.rating-star[data-rating="${i}"]`).classList.add('checked');
                }
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#buscador-productos').on('input', function() {
                let query = $(this).val();

                if (query.length >= 2) {
                    $.ajax({
                        url: '{{ route('buscar.productos') }}',
                        type: 'GET',
                        data: {
                            query: query
                        },
                        success: function(data) {
                            let sugerencias = $('#sugerencias');
                            sugerencias.empty().show();

                            if (data.length === 0) {
                                sugerencias.append('<div class="p-2">Sin resultados</div>');
                            }

                            data.forEach(function(producto) {
                                let imagen = producto.imagen ? '/img/productos/' +
                                    producto.imagen : '/img/productos/sin_foto.avif';
                                let item = `
                            <a href="/producto/info/${producto.id}" class="d-flex align-items-center p-2 border-bottom text-decoration-none text-dark">
                                <img src="${imagen}" alt="${producto.titulo}" style="width: 50px; height: 50px; object-fit: cover; margin-right: 10px;">
                                <div>
                                    <div class="fw-bold">${producto.titulo}</div>
                                    <div class="text-muted">$${parseFloat(producto.valor).toLocaleString()}</div>
                                </div>
                            </a>
                        `;
                                sugerencias.append(item);
                            });
                        }
                    });
                } else {
                    $('#sugerencias').hide();
                }
            });

            // Ocultar sugerencias al hacer clic fuera
            $(document).click(function(e) {
                if (!$(e.target).closest('#buscador-productos, #sugerencias').length) {
                    $('#sugerencias').hide();
                }
            });
        });
    </script>
</body>

</html>
