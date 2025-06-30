<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Marketplace</title>
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

</head>
<style>
    .seller-details.compact {
        margin-bottom: 15px;
        padding: 12px;
        background-color: #f8f9fa;
        border-radius: 8px;
        border: 1px solid #eaeaea;
        max-width: 300px;
        /* Opcional: limita el ancho */
    }

    .seller-title {
        margin: 0 0 12px 0;
        font-size: 16px;
        color: #333;
        font-weight: 600;
        padding-bottom: 6px;
        border-bottom: 1px solid #eee;
    }

    .seller-info.list-view {
        display: flex;
        flex-direction: column;
        gap: 10px;
    }

    .info-item {
        display: flex;
        align-items: center;
        font-size: 14px;
        color: #555;
        line-height: 1.4;
    }

    .info-item i {
        margin-right: 10px;
        color: #6c757d;
        width: 16px;
        text-align: center;
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
                        <a href="market" class="biolife-logo"><img src="/static/logoini.png" alt="logo"
                                width="200" height="60"></a>
                    </div>



                    <div class="col-lg-9 col-md-8 padding-top-2px">
                        <div class="header-search-bar layout-01">
                            <form action="#" class="form-search" name="desktop-seacrh" method="get">
                                <input type="text" name="s" class="input-text" value=""
                                    placeholder="Busca en marketplace..">

                                <button type="submit" class="btn-submit"><i
                                        class="biolife-icon icon-search"></i></button>
                            </form>
                        </div>
                        <div class="live-info">
                            <p class="telephone"><i class="fa fa-phone" aria-hidden="true"></i><b
                                    class="phone-number">(+57) 317 716 61 03</b></p>
                            <p class="working-time">Lun-Vie: 8:30am-7:30pm; Sab-Dom: 9:30am-4:30pm</p>
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
                <li class="nav-item"><a href="{{ url('/market') }}" class="permal-link">Inicio</a></li>

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
                                <li class="item">
                                    <img src="{{ url('/img/productos/' . $producto->imagen) }}"
                                        alt="{{ $producto->titulo }}" width="500" height="500">
                                </li>
                            @else
                                <li class="item">
                                    <img src="{{ url('/img/productos/sin_foto.avif') }}"
                                        alt="{{ $producto->titulo }}" width="500" height="500">
                                </li>
                            @endif
                        </ul>
                    </div>

                    <div class="product-attribute">
                        <h3 class="title">{{ $producto->titulo }}</h3>
                        <div class="rating">
                            <p class="star-rating"><span class="width-80percent"></span></p>



                        </div>
                        <div class="detail-item">
                            <span class="detail-label">Descripción:</span>

                            <p class="excerpt">{{ $producto->descripcion }}</p>
                        </div>

                        <div class="detail-item">
                            <span class="detail-label">Valor:</span>
                            <div class="price">
                                <ins><span class="price-amount"><span class="currencySymbol">$</span>
                                        {{ number_format($producto->valor, 2) }}</span></ins>


                            </div>

                        </div>

                    </div>




                    <div class="action-form">
                        <div class="seller-details compact">
                            <h4 class="seller-title">Vendedor(a)</h4>
                            <div class="seller-info list-view">
                                <div class="info-item">
                                    <i class="fas fa-user"></i>
                                    <span>{{ $producto->usuario->nombre }}</span>
                                </div>
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




                <div class="tab-panel active" id="tab-reviews">
                    <h4 class="title">Comentarios</h4>
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-5 col-md-5 col-sm-6 col-xs-12">
                                <div class="rating-info">
                                    <p class="index"><strong class="rating">4.4</strong>out of 5</p>
                                    <div class="rating">
                                        <p class="star-rating"><span class="width-80percent"></span></p>
                                    </div>
                                    <p class="see-all">See all 68 reviews</p>
                                    <ul class="options">
                                        <li>
                                            <div class="detail-for">
                                                <span class="option-name">5stars</span>
                                                <span class="progres">
                                                    <span class="line-100percent"><span
                                                            class="percent width-90percent"></span></span>
                                                </span>
                                                <span class="number">90</span>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="detail-for">
                                                <span class="option-name">4stars</span>
                                                <span class="progres">
                                                    <span class="line-100percent"><span
                                                            class="percent width-30percent"></span></span>
                                                </span>
                                                <span class="number">30</span>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="detail-for">
                                                <span class="option-name">3stars</span>
                                                <span class="progres">
                                                    <span class="line-100percent"><span
                                                            class="percent width-40percent"></span></span>
                                                </span>
                                                <span class="number">40</span>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="detail-for">
                                                <span class="option-name">2stars</span>
                                                <span class="progres">
                                                    <span class="line-100percent"><span
                                                            class="percent width-20percent"></span></span>
                                                </span>
                                                <span class="number">20</span>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="detail-for">
                                                <span class="option-name">1star</span>
                                                <span class="progres">
                                                    <span class="line-100percent"><span
                                                            class="percent width-10percent"></span></span>
                                                </span>
                                                <span class="number">10</span>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-7 col-md-7 col-sm-6 col-xs-12">
                                <div class="review-form-wrapper">
                                    <span class="title">Submit your review</span>
                                    <form action="#" name="frm-review" method="post">
                                        <div class="comment-form-rating">
                                            <label>1. Your rating of this products:</label>
                                            <p class="stars">
                                                <span>
                                                    <a class="btn-rating" data-value="star-1" href="#"><i
                                                            class="fa fa-star-o" aria-hidden="true"></i></a>
                                                    <a class="btn-rating" data-value="star-2" href="#"><i
                                                            class="fa fa-star-o" aria-hidden="true"></i></a>
                                                    <a class="btn-rating" data-value="star-3" href="#"><i
                                                            class="fa fa-star-o" aria-hidden="true"></i></a>
                                                    <a class="btn-rating" data-value="star-4" href="#"><i
                                                            class="fa fa-star-o" aria-hidden="true"></i></a>
                                                    <a class="btn-rating" data-value="star-5" href="#"><i
                                                            class="fa fa-star-o" aria-hidden="true"></i></a>
                                                </span>
                                            </p>
                                        </div>
                                        <p class="form-row wide-half">
                                            <input type="text" name="name" value=""
                                                placeholder="Your name">
                                        </p>
                                        <p class="form-row wide-half">
                                            <input type="email" name="email" value=""
                                                placeholder="Email address">
                                        </p>
                                        <p class="form-row">
                                            <textarea name="comment" id="txt-comment" cols="30" rows="10" placeholder="Write your review here..."></textarea>
                                        </p>
                                        <p class="form-row">
                                            <button type="submit" name="submit">submit review</button>
                                        </p>
                                    </form>
                                </div>
                            </div>
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
                                <a href="{{ route('producto.info', ['id' => $producto->id]) }}"
                                    class="link-to-product">
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
                                <h4 class="product-title"><a
                                        href="{{ route('producto.info', ['id' => $producto->id]) }}"
                                        class="pr-name">{{ $producto->titulo }}</a></h4>
                                <div class="price">
                                    <ins><span class="price-amount"><span
                                                class="currencySymbol">$</span>{{ number_format($producto->valor, 2) }}</span></ins>
                                </div>
                                <div class="slide-down-box">
                                    <p class="message">{{ $producto->descripcion }}</p>
                                    <div class="buttons">
                                        <a href="#" class="btn wishlist-btn"><i class="fa fa-heart"
                                                aria-hidden="true"></i></a>
                                        <a href="#" class="btn add-to-cart-btn"><i
                                                class="fa fa-cart-arrow-down" aria-hidden="true"></i>add to cart</a>
                                        <a href="#" class="btn compare-btn"><i class="fa fa-random"
                                                aria-hidden="true"></i></a>
                                    </div>
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
        <div class="footer-content background-footer-03">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-9">
                        <section class="footer-item">
                           <a href="{{ url('/market') }}" class="biolife-logo"><img src="/static/logoini.png" alt="logo"
                                width="200" height="60"></a>
                            <div class="footer-phone-info">
                                <i class="biolife-icon icon-head-phone"></i>
                                <p class="r-info">
                                    <span>Got Questions ?</span>
                                    <span>(700)  9001-1909 (900) 689 -66</span>
                                </p>
                            </div>
                            <div class="newsletter-block layout-01">
                                <h4 class="title">Newsletter Signup</h4>
                                <div class="form-content">
                                    <form action="#" name="new-letter-foter">
                                        <input type="email" class="input-text email" value=""
                                            placeholder="Your email here...">
                                        <button type="submit" class="bnt-submit" name="ok">Sign up</button>
                                    </form>
                                </div>
                            </div>
                        </section>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6 md-margin-top-5px sm-margin-top-50px xs-margin-top-40px">
                        <section class="footer-item">
                            <h3 class="section-title">Useful Links</h3>
                            <div class="row">
                                <div class="col-lg-6 col-sm-6 col-xs-6">
                                    <div class="wrap-custom-menu vertical-menu-2">
                                        <ul class="menu">
                                            <li><a href="#">About Us</a></li>
                                            <li><a href="#">About Our Shop</a></li>
                                            <li><a href="#">Secure Shopping</a></li>
                                            <li><a href="#">Delivery infomation</a></li>
                                            <li><a href="#">Privacy Policy</a></li>
                                            <li><a href="#">Our Sitemap</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-sm-6 col-xs-6">
                                    <div class="wrap-custom-menu vertical-menu-2">
                                        <ul class="menu">
                                            <li><a href="#">Who We Are</a></li>
                                            <li><a href="#">Our Services</a></li>
                                            <li><a href="#">Projects</a></li>
                                            <li><a href="#">Contacts Us</a></li>
                                            <li><a href="#">Innovation</a></li>
                                            <li><a href="#">Testimonials</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6 md-margin-top-5px sm-margin-top-50px xs-margin-top-40px">
                        <section class="footer-item">
                            <h3 class="section-title">Transport Offices</h3>
                            <div class="contact-info-block footer-layout xs-padding-top-10px">
                                <ul class="contact-lines">
                                    <li>
                                        <p class="info-item">
                                            <i class="biolife-icon icon-location"></i>
                                            <b class="desc">7563 St. Vicent Place, Glasgow, Greater Newyork NH7689,
                                                UK </b>
                                        </p>
                                    </li>
                                    <li>
                                        <p class="info-item">
                                            <i class="biolife-icon icon-phone"></i>
                                            <b class="desc">Phone: (+067) 234 789 (+068) 222 888</b>
                                        </p>
                                    </li>
                                    <li>
                                        <p class="info-item">
                                            <i class="biolife-icon icon-letter"></i>
                                            <b class="desc">Email: contact@company.com</b>
                                        </p>
                                    </li>
                                    <li>
                                        <p class="info-item">
                                            <i class="biolife-icon icon-clock"></i>
                                            <b class="desc">Hours: 7 Days a week from 10:00 am</b>
                                        </p>
                                    </li>
                                </ul>
                            </div>
                            <div class="biolife-social inline">
                                <ul class="socials">
                                    <li><a href="#" title="twitter" class="socail-btn"><i
                                                class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                    <li><a href="#" title="facebook" class="socail-btn"><i
                                                class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                    <li><a href="#" title="pinterest" class="socail-btn"><i
                                                class="fa fa-pinterest" aria-hidden="true"></i></a></li>
                                    <li><a href="#" title="youtube" class="socail-btn"><i
                                                class="fa fa-youtube" aria-hidden="true"></i></a></li>
                                    <li><a href="#" title="instagram" class="socail-btn"><i
                                                class="fa fa-instagram" aria-hidden="true"></i></a></li>
                                </ul>
                            </div>
                        </section>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <div class="separator sm-margin-top-70px xs-margin-top-40px"></div>
                    </div>
                    <div class="col-lg-6 col-sm-6 col-xs-12">
                        <div class="copy-right-text">
                            <p><a href="templateshub.net">Templates Hub</a></p>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-6 col-xs-12">
                        <div class="payment-methods">
                            <ul>
                                <li><a href="#" class="payment-link"><img src="/assets/images/card1.jpg"
                                            width="51" height="36" alt=""></a></li>
                                <li><a href="#" class="payment-link"><img src="/assets/images/card2.jpg"
                                            width="51" height="36" alt=""></a></li>
                                <li><a href="#" class="payment-link"><img src="/assets/images/card3.jpg"
                                            width="51" height="36" alt=""></a></li>
                                <li><a href="#" class="payment-link"><img src="/assets/images/card4.jpg"
                                            width="51" height="36" alt=""></a></li>
                                <li><a href="#" class="payment-link"><img src="/assets/images/card5.jpg"
                                            width="51" height="36" alt=""></a></li>
                            </ul>
                        </div>
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
</body>

</html>
