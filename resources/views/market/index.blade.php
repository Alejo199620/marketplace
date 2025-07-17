<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Marketplace Catálogo</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <link href="https://fonts.googleapis.com/css?family=Cairo:400,600,700&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:600&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400i,700i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Ubuntu&amp;display=swap" rel="stylesheet">
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon.png" />
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/animate.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/nice-select.css">
    <link rel="stylesheet" type="text/css" href="assets/css/slick.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="assets/css/main-color.css">

</head>
<style>
    #sugerencias a {
        display: flex;
        align-items: center;
        padding: 10px;
        gap: 10px;
        border-bottom: 1px solid #eee;
        text-decoration: none;
        color: #333;
        transition: background 0.2s ease-in-out;
    }

    #sugerencias a:hover {
        background-color: #f5f5f5;
    }

    #sugerencias img {
        width: 50px;
        height: 50px;
        object-fit: cover;
        border-radius: 5px;
    }
</style>

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
                        <a href="market" class="biolife-logo"><img src="./static/logoini.png" alt="logo"
                                width="200" height="60"></a>
                    </div>


                    <div class="col-lg-9 col-md-8 padding-top-2px">
                        <div class="header-search-bar layout-01" style="margin-left:40px;">

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
                        {{-- @guest
                            <div class="text-end mt-2">
                                <a href="{{ route('login') }}" class="btn btn-outline-primary btn-sm">
                                    <i class="fas fa-sign-in-alt me-1"></i> Inicia sesión para ofrecer tus productos
                                </a>
                            </div>
                        @endguest --}}


                    </div>

                </div>
            </div>
        </div>
    </header>

    <!-- Page Contain -->
    <div class="page-contain">

        <!-- Main content -->
        <div id="main-content" class="main-content">




            <!--Block 03: Product Tab-->
            <div class="product-tab z-index-20 sm-margin-top-193px xs-margin-top-30px">
                <div class="container">
                    <div class="biolife-title-box">
                        {{-- <span class="subtitle">All the best item for You</span> --}}
                        <h3 class="main-title">Categorias</h3>
                    </div>
                    <div class="biolife-tab biolife-tab-contain sm-margin-top-34px">
                        <div class="tab-head tab-head__icon-top-layout icon-top-layout">
                            @php
                                $iconos = [
                                    'tecnologia' => 'fas fa-laptop',
                                    'electrodomesticos' => 'fas fa-plug',
                                    'hogar y muebles' => 'fas fa-couch',
                                    'ropa y accesorios' => 'fas fa-tshirt',
                                    'vehiculos' => 'fas fa-car',
                                    'deportes' => 'fas fa-football-ball',
                                    'juguetes y niños' => 'fas fa-puzzle-piece',
                                    'salud y belleza' => 'fas fa-spa',
                                    'mascotas' => 'fas fa-paw',
                                    'libros y papeleria' => 'fas fa-book',
                                ];
                            @endphp

                            <ul class="tabs md-margin-bottom-35-im xs-margin-bottom-40-im">
                                @foreach ($categorias as $key => $categoria)
                                    @php
                                        $nombre = strtolower(trim($categoria->nombre));
                                        $icono = $iconos[$nombre] ?? 'fas fa-tags';
                                    @endphp
                                    <li class="tab-element {{ $key == 0 ? 'active' : '' }}">
                                        <a href="#tab{{ $categoria->slug }}"
                                            class="tab-link flex flex-col items-center text-center">
                                            <i class="{{ $icono }} text-xl mb-1"></i>
                                            <span class="text-sm">{{ $categoria->nombre }}</span>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>

                        </div>
                        <div class="tab-content">

                            @foreach ($categorias as $key => $categoria)
                                <div id="tab{{ $categoria->slug }}"
                                    class="tab-contain {{ $key == 0 ? 'active' : '' }}">
                                    <ul class="products-list biolife-carousel nav-center-02 nav-none-on-mobile eq-height-contain"
                                        data-slick='{"rows":2 ,"arrows":true,"dots":false,"infinite":true,"speed":400,"slidesMargin":10,"slidesToShow":4, "responsive":[{"breakpoint":1200, "settings":{ "slidesToShow": 4}},{"breakpoint":992, "settings":{ "slidesToShow": 3, "slidesMargin":25 }},{"breakpoint":768, "settings":{ "slidesToShow": 2, "slidesMargin":15}}]}'>

                                        @foreach ($categoria->productos as $producto)
                                            <li class="product-item">
                                                <div class="contain-product layout-default">
                                                    <div class="product-thumb">
                                                        <a href="{{ route('producto.info', ['id' => $producto->id]) }}"
                                                            class="link-to-product">
                                                            @if (isset($producto->imagen))
                                                                <img src="{{ url('/img/productos/' . $producto->imagen) }}"
                                                                    alt="Vegetables" width="270" height="270"
                                                                    class="product-thumnail">
                                                            @else
                                                                <img src="{{ url('/img/productos/sin_foto.avif') }}"
                                                                    alt="Vegetables" width="270" height="270"
                                                                    class="product-thumnail">
                                                            @endif
                                                        </a>

                                                    </div>
                                                    <div class="info">
                                                        <b class="categories">{{ $categoria->nombre }}</b>
                                                        <h4 class="product-title"><a href="#"
                                                                class="pr-name">{{ $producto->titulo }}</a></h4>
                                                        <div class="price ">
                                                            <ins><span class="price-amount"><span
                                                                        class="currencySymbol">$</span>{{ number_format($producto->valor, 2) }}</span></ins>
                                                            {{-- <del><span class="price-amount"><span class="currencySymbol">£</span>95.00</span></del> --}}
                                                        </div>
                                                        <div class="slide-down-box">
                                                            <p class="message">{{ $producto->descripcion }}</p>

                                                        </div>
                                                    </div>
                                                </div>
                                        @endforeach


                                    </ul>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>





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





    {{-- <!--Quickview Popup-->
    <div id="biolife-quickview-block" class="biolife-quickview-block">
        <div class="quickview-container">
            <a href="#" class="btn-close-quickview" data-object="open-quickview-block"><span
                    class="biolife-icon icon-close-menu"></span></a>
            <div class="biolife-quickview-inner">
                <div class="media">
                    <ul class="biolife-carousel quickview-for"
                        data-slick='{"arrows":false,"dots":false,"slidesMargin":30,"slidesToShow":1,"slidesToScroll":1,"fade":true,"asNavFor":".quickview-nav"}'>
                        <li><img src="assets/images/details-product/detail_01.jpg" alt="" width="500"
                                height="500"></li>
                        <li><img src="assets/images/details-product/detail_02.jpg" alt="" width="500"
                                height="500"></li>
                        <li><img src="assets/images/details-product/detail_03.jpg" alt="" width="500"
                                height="500"></li>
                        <li><img src="assets/images/details-product/detail_04.jpg" alt="" width="500"
                                height="500"></li>
                        <li><img src="assets/images/details-product/detail_05.jpg" alt="" width="500"
                                height="500"></li>
                        <li><img src="assets/images/details-product/detail_06.jpg" alt="" width="500"
                                height="500"></li>
                        <li><img src="assets/images/details-product/detail_07.jpg" alt="" width="500"
                                height="500"></li>
                    </ul>
                    <ul class="biolife-carousel quickview-nav"
                        data-slick='{"arrows":true,"dots":false,"centerMode":false,"focusOnSelect":true,"slidesMargin":10,"slidesToShow":3,"slidesToScroll":1,"asNavFor":".quickview-for"}'>
                        <li><img src="assets/images/details-product/thumb_01.jpg" alt="" width="88"
                                height="88"></li>
                        <li><img src="assets/images/details-product/thumb_02.jpg" alt="" width="88"
                                height="88"></li>
                        <li><img src="assets/images/details-product/thumb_03.jpg" alt="" width="88"
                                height="88"></li>
                        <li><img src="assets/images/details-product/thumb_04.jpg" alt="" width="88"
                                height="88"></li>
                        <li><img src="assets/images/details-product/thumb_05.jpg" alt="" width="88"
                                height="88"></li>
                        <li><img src="assets/images/details-product/thumb_06.jpg" alt="" width="88"
                                height="88"></li>
                        <li><img src="assets/images/details-product/thumb_07.jpg" alt="" width="88"
                                height="88"></li>
                    </ul>
                </div>
                <div class="product-attribute">
                    <h4 class="title"><a href="#" class="pr-name">National Fresh Fruit</a></h4>
                    <div class="rating">
                        <p class="star-rating"><span class="width-80percent"></span></p>
                    </div>

                    <div class="price price-contain">
                        <ins><span class="price-amount"><span class="currencySymbol">£</span>85.00</span></ins>
                        <del><span class="price-amount"><span class="currencySymbol">£</span>95.00</span></del>
                    </div>
                    <p class="excerpt">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris vel maximus
                        lacus. Duis ut mauris eget justo dictum tempus sed vel tellus.</p>
                    <div class="from-cart">
                        <div class="qty-input">
                            <input type="text" name="qty12554" value="1" data-max_value="20"
                                data-min_value="1" data-step="1">
                            <a href="#" class="qty-btn btn-up"><i class="fa fa-caret-up"
                                    aria-hidden="true"></i></a>
                            <a href="#" class="qty-btn btn-down"><i class="fa fa-caret-down"
                                    aria-hidden="true"></i></a>
                        </div>
                        <div class="buttons">
                            <a href="#" class="btn add-to-cart-btn btn-bold">add to cart</a>
                        </div>
                    </div>

                    <div class="product-meta">
                        <div class="product-atts">
                            <div class="product-atts-item">
                                <b class="meta-title">Categories:</b>
                                <ul class="meta-list">
                                    <li><a href="#" class="meta-link">Milk & Cream</a></li>
                                    <li><a href="#" class="meta-link">Fresh Meat</a></li>
                                    <li><a href="#" class="meta-link">Fresh Fruit</a></li>
                                </ul>
                            </div>
                            <div class="product-atts-item">
                                <b class="meta-title">Tags:</b>
                                <ul class="meta-list">
                                    <li><a href="#" class="meta-link">food theme</a></li>
                                    <li><a href="#" class="meta-link">organic food</a></li>
                                    <li><a href="#" class="meta-link">organic theme</a></li>
                                </ul>
                            </div>
                            <div class="product-atts-item">
                                <b class="meta-title">Brand:</b>
                                <ul class="meta-list">
                                    <li><a href="#" class="meta-link">Fresh Fruit</a></li>
                                </ul>
                            </div>
                        </div>
                        <span class="sku">SKU: N/A</span>
                        <div class="biolife-social inline add-title">
                            <span class="fr-title">Share:</span>
                            <ul class="socials">
                                <li><a href="#" title="twitter" class="socail-btn"><i class="fa fa-twitter"
                                            aria-hidden="true"></i></a></li>
                                <li><a href="#" title="facebook" class="socail-btn"><i class="fa fa-facebook"
                                            aria-hidden="true"></i></a></li>
                                <li><a href="#" title="pinterest" class="socail-btn"><i
                                            class="fa fa-pinterest" aria-hidden="true"></i></a></li>
                                <li><a href="#" title="youtube" class="socail-btn"><i class="fa fa-youtube"
                                            aria-hidden="true"></i></a></li>
                                <li><a href="#" title="instagram" class="socail-btn"><i
                                            class="fa fa-instagram" aria-hidden="true"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

    <!-- Scroll Top Button -->
    <a class="btn-scroll-top"><i class="biolife-icon icon-left-arrow"></i></a>

    <script src="assets/js/jquery-3.4.1.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.countdown.min.js"></script>
    <script src="assets/js/jquery.nice-select.min.js"></script>
    <script src="assets/js/jquery.nicescroll.min.js"></script>
    <script src="assets/js/slick.min.js"></script>
    <script src="assets/js/biolife.framework.js"></script>
    <script src="assets/js/functions.js"></script>

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
