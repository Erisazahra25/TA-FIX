<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="html 5 template">
    <meta name="author" content="">
    <title>Pasar Dunia Seafood</title>
    <!-- FAVICON -->
    <link rel="shortcut icon" type="image/x-icon" href="/landing/favicon.ico">
    <link rel="stylesheet" href="/landing/css/jquery-ui.css">
    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,300i,400,400i%7CMontserrat:600,800" rel="stylesheet">
    <!-- FONT AWESOME -->
    <link rel="stylesheet" href="/landing/font/flaticon.css">
    <link rel="stylesheet" href="/landing/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="/landing/css/fontawesome-5-all.min.css">
    <link rel="stylesheet" href="/landing/css/font-awesome.min.css">
    <!-- ARCHIVES CSS -->
    <link rel="stylesheet" href="/landing/css/search-form.css">
    <link rel="stylesheet" href="/landing/css/search.css">
    <link rel="stylesheet" href="/landing/css/animate.css">
    <link rel="stylesheet" href="/landing/css/aos.css">
    <link rel="stylesheet" href="/landing/css/aos2.css">
    <link rel="stylesheet" href="/landing/css/magnific-popup.css">
    <link rel="stylesheet" href="/landing/css/lightcase.css">
    <link rel="stylesheet" href="/landing/css/owl.carousel.min.css">
    <link rel="stylesheet" href="/landing/css/bootstrap.min.css">
    <link rel="stylesheet" href="/landing/css/menu.css">
    <link rel="stylesheet" href="/landing/css/slick.css">
    <link rel="stylesheet" href="/landing/css/styles.css">
    <link rel="stylesheet" id="color" href="/landing/css/default.css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body class="homepage-3 the-search">
    <!-- Wrapper -->
    <div id="wrapper">
        <!-- START SECTION HEADINGS -->
        <!-- Header Container
    ================================================== -->
        <header id="header-container" class="header head-tr">
            <!-- Header -->
            <div id="header" class="head-tr bottom">
                <div class="container container-header">
                    <!-- Left Side Content -->
                    <div class="left-side">
                        <!-- Logo -->
                        <div id="logo">

                        </div>
                        <!-- Main Navigation -->
                        <nav id="navigation" class="style-1 head-tr">
                            <ul id="responsive">
                                <li><a href="#">Home</a></li>
                                <li><a href="#product">Product</a></li>
                                <li><a href="#about">Achievement</a></li>
                                <li><a href="#contact">Contact</a></li>
                            </ul>
                        </nav>
                        <!-- Main Navigation / End -->
                    </div>
                    <!-- Left Side Content / End -->
                    <div class="right-side d-none d-none d-lg-none d-xl-flex" style="margin-right: 10px">
                        <!-- Header Widget -->
                        <div class="header-widget">
                            <a href="/login" class="button border text-center"><i class="fas fa-lock ml-2"></i>
                                Login</a>
                        </div>
                        <!-- Header Widget / End -->
                    </div>
                </div>
            </div>
            <!-- Header / End -->

        </header>
        <div class="clearfix"></div>
        <!-- Header Container / End -->

        <!-- START SECTION INFO-HELP -->
        <section class="info-help h17">
            <div class="container">
                <div class="row info-head">
                    <div class="col-lg-6 col-md-8 col-xs-8" data-aos="fade-right">
                        <div class="info-text">
                            <h3>Get The Shrimp You Are Looking For Here</h3>
                            <p class="mt-3">Start at {{ formatPrice($min_price_product) }}/Kg </p>
                            <p class="pt-2"> (shipping price is calculated per kg) </p>
                            <div class="inf-btn pro">
                                <a href="/login" class="btn btn-pro btn-secondary btn-lg">Get Started</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-3"></div>
                </div>
            </div>
        </section>
        <!-- END SECTION INFO-HELP -->

        <!-- START SECTION PROPERTIES FOR SALE -->
        <section class="featured portfolio bg-white-2 rec-pro">
            <div class="container-fluid">
                <div class="sec-title">
                    <h2 id="product"><span> Vannamei Shrimp Ready</span> Stock</h2>
                    <p>We sell fresh shrimp</p>
                    <p style="text-align: justify"> Vannamei shrimp has several advantages compared to other types of shrimp, namely; disease resistance high, the need for a relatively lower protein content, faster growth, tolerant of changes in water temperature and dissolved oxygen
                        and able to utilize the entire water column in the cultivation container. </p>
                </div>
                <div class="portfolio col-xl-12">
                    <div class="slick-lancers2">
                        @foreach ($products as $product)
                            <div class="agents-grid">
                                <div class="landscapes">
                                    <div class="project-single">
                                        <div class="project-inner project-head">
                                            <div class="homes">
                                                <!-- homes img -->
                                                <a href="#" class="homes-img">
                                                    <img src="{{ $product['image'] }}" alt="home-1"
                                                        class="img-responsive">
                                                </a>
                                            </div>
                                        </div>
                                        <!-- homes content -->
                                        <div class="homes-content">
                                            <!-- homes address -->
                                            <h2><a href="#">{{ $product['name'] }}</a></h2>
                                            <p class="homes-address mb-3" style="font-size: 18px;">
                                                <i class="fas fa-fish"></i><span> {{ $product['summary'] }}</span>
                                            </p>
                                            <!-- homes List -->
                                            @if ($product->productDetails()->count() > 0)
                                                <ul class="homes-list clearfix">
                                                    <li class="the-icons" style="font-size: 15px;">
                                                        <i class="fas fa-box mr-2"></i>
                                                        <span>{{ $product->productDetails()->sum('stock') }} Kg</span>
                                                    </li>
                                                </ul>
                                                <div class="price-properties footer pt-3 pb-0">
                                                    <h3 class="title mt-3" style="text-transform: none;">
                                                        @if ($product->productDetails()->min('price') === $product->productDetails()->max('price'))
                                                            <p style="font-size: 15px;">
                                                                {{ formatPrice($product->productDetails()->min('price')) }}
                                                                /Kg</p>
                                                        @else
                                                            <p style="font-size: 15px;">
                                                                {{ formatPrice($product->productDetails()->min('price')) }}
                                                                to
                                                                {{ formatPrice($product->productDetails()->max('price')) }}
                                                                /Kg</p>
                                                        @endif
                                                    </h3>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
        <!-- END SECTION PROPERTIES FOR SALE -->

        <!-- START SECTION WHY CHOOSE US -->
        {{-- <section class="how-it-works bg-white">
        <div class="container">
            <div class="sec-title">
                <h2><span>About </span> Us</h2>
                <p>We provide full service at every step.</p>
            </div>

            <div class="row service-1">
                <article class="col-lg-4 col-md-6 col-xs-12 serv" data-aos="zoom-in" data-aos-delay="150">
                    <div class="serv-flex">
                        <div class="art-1 img-13">
                            <img src="/landing/images/icons/icon-12.svg" alt="">
                            <h3>PT. PASAR DUNIA SEAFOOD</h3>
                        </div>
                        <div class="service-text-p">
                            <p class="text-center">Jl.Raya Jember Km 17, Jajang Surat,
                                Karangbendo, Kecamatan Rogojampi, Kabupaten Banyuwangi, Jawa Timur 68462,
                                Indonesia.</p>
                        </div>
                    </div>
                </article>
                <article class="col-lg-4 col-md-6 col-xs-12 serv" data-aos="zoom-in" data-aos-delay="250">
                    <div class="serv-flex">
                        <div class="art-1 img-14">
                            <img src="/landing/images/icons/icon-13.svg" alt="">
                            <h3>NO TELP, INSTAGRAM, & EMAIL</h3>
                        </div>
                        <div class="service-text-p">
                            <p class="text-center">0333-6370079
                                <br>
                                <br>
                                @pasarduniaseafood
                                <br>
                                sedulurpds@yahoo.com

                            </p>
                        </div>
                    </div>
                </article>
                <article class="col-lg-4 col-md-6 col-xs-12 serv mb-0 pt" data-aos="zoom-in" data-aos-delay="350">
                    <div class="serv-flex arrow">
                        <div class="art-1 img-15">
                            <img src="/landing/images/icons/icon-14.svg" alt="">
                            <h3>Contact Admin</h3>
                        </div>
                        <div class="service-text-p">
                            <p class="text-center">+62 822-3659-5794 (Admin PT. Pasar Dunia Seafood Atas Nama Hudan Waskito)
                                contack kepada admin hanya digunakan untuk complain
                            </p>
                        </div>
                    </div>
                </article>
            </div>
        </div>
    </section> --}}
        <!-- END SECTION WHY CHOOSE US -->

        <!-- SECTION Archivement -->
        <section class="featured portfolio bg-white rec-pro">
            <div class="container-fluid">
                <div class="sec-title">
                    <h2 id="about">Achievement</h2>
                    <p>We Achievement Appriated Grovement</p>
                </div>
                <div class="portfolio col-m-12">
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <div class="col-md-6">
                                    <img class="d-block w-53" src="https://i.ibb.co/z4g40zp/44.jpg"
                                        alt="1 slide">
                                </div>
                                <div class="col-md-6">
                                    <h3>Piagam Penghargaan</h3>
                                    <br>
                                    <h4 style="text-align: left"> Piagam Penghargaan dari Kepala KPP Pratama Kabupaten
                                        Banyuwangi Tahun 2020.
                                        <br>
                                        Dipersembahkan Kepada PT. Pasar Dunia Seafood Sebagai Wajib Pajak Yang Telah
                                        Memberikan Kontribusi Terbaik Untuk Negara Republik Indonesia .
                                    </h4>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="col-md-6">
                                    <h3>Piagam Penghargaan</h3>
                                    <br>
                                    <h4> Sertifikat Penghargaan Dari FUSO PT. Krama Yudha Tiga Berlian Motors.
                                        <br>
                                        Dipersembahkan Kepada PT. Pasar Dunia Seafood,
                                        <br>
                                        Sebagai Pelanggan Setia Mitsubushi Fuso Selama 50 Tahun Dan Juga Berkontribusi
                                        Untuk Kemajuan Negara Indonesia.
                                    </h4>
                                </div>
                                <div class="col-md-6">
                                    <img class="d-block w-53" src="https://i.ibb.co/6HdYBqB/allo1.jpg"
                                        alt="2 slide">
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="col-md-6">
                                    <img class="d-block w-53" src="https://i.ibb.co/fnqFmhm/33.jpg" alt="3 slide">
                                </div>
                                <div class="col-md-6">
                                    <h3>Piagam Penghargaan</h3>
                                    <br>
                                    <h4> Piala Penghargaan Dari FUSO PT. Dipo Internasional Pahala Otomotif.
                                        <br>
                                        Dipersembahkan Kepada PT. Pasar Dunia Seafood Sebagai "Best Driver" Hairul Hadi
                                        Mitsubishi Fuso Gathering 2019.
                                    </h4>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="col-md-6">
                                    <h3>Piagam Penghargaan</h3>
                                    <br>
                                    <h4> Piala Penghargaan Dari FUSO PT. Krama Yudha Tiga Berlian Motors Dan PT. Dipo
                                        Internasional Pahala Otomotif.
                                        <br>
                                        Dipersembahkan Kepada pegawai PT. Pasar Dunia Seafood. Sebagai "Profesional Business
                                        Partner" Dan Best Customers FUSO PT. Krama Yudha Tiga Berlian Motors,
                                        <br>
                                        Pada tahun 2018Dan Sebagai Best Driver Mitsubishi Fuso Gathering 2019.
                                    </h4>
                                </div>
                                <div class="col-md-6">
                                    <img class="d-block w-53" src="https://i.ibb.co/0ZS31m2/allo2.jpg"
                                        alt="4 slide">
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="col-md-6">
                                    <img class="d-block w-53" src="https://i.ibb.co/G34ntwg/55.jpg" alt="5 slide">
                                </div>
                                <div class="col-md-6">
                                    <h3>Piagam Penghargaan</h3>
                                    <br>
                                    <h4> Piala Penghargaan Dari FUSO PT. Krama Yudha Tiga Berlian Motors Dan PT. Dipo
                                        Internasional Pahala Otomotif.
                                        <br>
                                        Dipersembahkan Kepada PT. Pasar Dunia Seafood. Sebagai "Profesional Business
                                        Partner" Dan Best Customers FUSO PT. Krama Yudha Tiga Berlian Motors,
                                        <br>
                                        Pada tahun 2018Dan Sebagai Best Driver Mitsubishi Fuso Gathering 2018.
                                    </h4>
                                </div>
                            </div>

                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button"
                            data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button"
                            data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>
        </section>


        <!-- START FOOTER -->
        <footer class="first-footer" id="contact">
            <div class="top-footer">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-9 col-md-6">
                            <div class="netabout">
                                <div class="logo" style="color: aliceblue">
                                    <img src="https://i.ibb.co/6gfnbG4/rmbg.png" style="height:70px; width:70px"
                                        alt="netcom">
                                    PT.PASAR DUNIA SEAFOOD
                                </div>
                                <p>Jl.Raya Jember Km 17, Jajang Surat,
                                    Karangbendo,Kecamatan Rogojampi, Kabupaten Banyuwangi, Jawa Timur 68462,
                                    Indonesia.</p>
                            </div>
                            <br>
                            <div class="contactus">
                                <ul>
                                    <li>
                                        <div class="info">
                                            <i class="fa fa-map-marker" aria-hidden="true"></i>
                                            <p class="in-p">Banyuwangi, Jawa Timur</p>
                                        </div>
                                    </li>
                                    <br>
                                    <li>
                                        <div class="info">
                                            <i class="fa fa-phone" aria-hidden="true"></i>
                                            <p class="in-p">0333-6370079</p>
                                        </div>
                                    </li>
                                    <br>
                                    <li>
                                        <div class="info">
                                            <i class="fa fa-envelope" aria-hidden="true"></i>
                                            <p class="in-p ti">sedulurpds@yahoo.com</p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6">
                            <div class="newsletters">
                                <h3>Location Company</h3>
                                <iframe class="text-center mt-5" style="style=border:0;"
                                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3948.0673527790127!2d114.30565011365839!3d-8.296096394031286!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd150c7d65272f5%3A0xb63b0621a0d5b753!2sPT.%20Pasar%20Dunia%20Seafood!5e0!3m2!1sid!2sid!4v1641306943202!5m2!1sid!2sid"
                                    allowfullscreen="" loading="lazy"></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="second-footer">
                <div class="container">
                    <p>2022 © Copyright {{ env('APP_NAME') }} - PT. PASAR DUNIA SEAFOOD</p>
                    <ul class="netsocials">
                        <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                        <li><a href="#"><i class="fa fa-youtube" aria-hidden="true"></i></a></li>
                    </ul>
                </div>
            </div>
        </footer>

        <a data-scroll href="#wrapper" class="go-up"><i class="fa fa-angle-double-up" aria-hidden="true"></i></a>
        <!-- END FOOTER -->

        <!-- START PRELOADER -->
        <div id="preloader">
            <div id="status">
                <div class="status-mes"></div>
            </div>
        </div>
        <!-- END PRELOADER -->

        <!-- ARCHIVES JS -->
        <script src="/landing/js/jquery-3.5.1.min.js"></script>
        <script src="/landing/js/rangeSlider.js"></script>
        <script src="/landing/js/tether.min.js"></script>
        <script src="/landing/js/moment.js"></script>
        <script src="/landing/js/bootstrap.min.js"></script>
        <script src="/landing/js/mmenu.min.js"></script>
        <script src="/landing/js/mmenu.js"></script>
        <script src="/landing/js/aos.js"></script>
        <script src="/landing/js/aos2.js"></script>
        <script src="/landing/js/slick.min.js"></script>
        <script src="/landing/js/fitvids.js"></script>
        <script src="/landing/js/fitvids.js"></script>
        <script src="/landing/js/jquery.waypoints.min.js"></script>
        <script src="/landing/js/jquery.counterup.min.js"></script>
        <script src="/landing/js/imagesloaded.pkgd.min.js"></script>
        <script src="/landing/js/isotope.pkgd.min.js"></script>
        <script src="/landing/js/smooth-scroll.min.js"></script>
        <script src="/landing/js/lightcase.js"></script>
        <script src="/landing/js/search.js"></script>
        <script src="/landing/js/owl.carousel.js"></script>
        <script src="/landing/js/jquery.magnific-popup.min.js"></script>
        <script src="/landing/js/ajaxchimp.min.js"></script>
        <script src="/landing/js/newsletter.js"></script>
        <script src="/landing/js/jquery.form.js"></script>
        <script src="/landing/js/jquery.validate.min.js"></script>
        <script src="/landing/js/searched.js"></script>
        <script src="/landing/js/forms-2.js"></script>
        <script src="/landing/js/range.js"></script>
        <script src="/landing/js/color-switcher.js"></script>
        <script>
            $(window).on('scroll load', function() {
                $("#header.cloned #logo img").attr("src", $('#header #logo img').attr('data-sticky-logo'));
            });
        </script>

        <!-- Slider Revolution scripts -->
        <script src="/landing/revolution/js/jquery.themepunch.tools.min.js"></script>
        <script src="/landing/revolution/js/jquery.themepunch.revolution.min.js"></script>

        <script>
            $('.slick-lancers').slick({
                infinite: false,
                slidesToShow: 4,
                slidesToScroll: 1,
                dots: true,
                arrows: true,
                adaptiveHeight: true,
                responsive: [{
                    breakpoint: 1292,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2,
                        dots: true,
                        arrows: false
                    }
                }, {
                    breakpoint: 993,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2,
                        dots: true,
                        arrows: false
                    }
                }, {
                    breakpoint: 769,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        dots: true,
                        arrows: false
                    }
                }, ]
            });
        </script>
        <script>
            $('.slick-lancers2').slick({
                infinite: false,
                slidesToShow: 4,
                slidesToScroll: 1,
                dots: true,
                arrows: false,
                adaptiveHeight: true,
                responsive: [{
                    breakpoint: 1292,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2,
                        dots: true,
                        arrows: false
                    }
                }, {
                    breakpoint: 993,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2,
                        dots: true,
                        arrows: false
                    }
                }, {
                    breakpoint: 769,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        dots: true,
                        arrows: false
                    }
                }, ]
            });
        </script>
        <script>
            $('.job_clientSlide').owlCarousel({
                items: 2,
                loop: true,
                margin: 30,
                autoplay: false,
                nav: true,
                smartSpeed: 1000,
                slideSpeed: 1000,
                navText: ["<i class='fa fa-chevron-left'></i>", "<i class='fa fa-chevron-right'></i>"],
                dots: false,
                responsive: {
                    0: {
                        items: 1
                    },
                    991: {
                        items: 2
                    }
                }
            });
        </script>

        <script>
            $(".dropdown-filter").on('click', function() {

                $(".explore__form-checkbox-list").toggleClass("filter-block");

            });
        </script>

        <!-- MAIN JS -->
        <script src="/landing/js/script.js"></script>

    </div>
    <!-- Wrapper / End -->
</body>

</html>
