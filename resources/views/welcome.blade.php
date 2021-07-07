<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>home</title>
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src={{asset("https://use.fontawesome.com/releases/v5.15.3/js/all.js")}} crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href={{asset("css/styles.css")}} rel="stylesheet" />
    </head>
    <body>
        <header>
            <h1 class="site-heading text-center text-faded d-none d-lg-block">
                <span class="site-heading-upper text-primary mb-3">Sistema de informacion para</span>
                <span class="site-heading-lower">LABORATORIO DE ANALISIS</span>
            </h1>
        </header>
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark py-lg-4" id="mainNav">
            <div class="container">
                <a class="navbar-brand text-uppercase fw-bold d-lg-none" href="index.html">ABOUT US</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mx-auto">
                        <li class="nav-item px-lg-4"><a href="{{ route('patient.login') }}"><button type="button" class="btn btn-info">Login <i class="fas fa-heartbeat"></i> </button></a> </li>
                        
                        <li class="nav-item px-lg-4"><a class="nav-link text-uppercase" href="{{ route('register') }}">Registro</a></li>
                        {{-- <li class="nav-item px-lg-4"><a class="nav-link text-uppercase" href="products.html">Products</a></li> --}}
                        <li class="nav-item px-lg-4"><a class="nav-link text-uppercase" href="{{ route('plan.index') }}">Planes</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <section class="page-section clearfix">
            <div class="container">
                <div class="intro">
                    <img class="intro-img img-fluid mb-3 mb-lg-0 rounded" src={{asset("assets/img/intro1.jpg")}} alt="..." />
                    <div class="intro-text left-0 text-center bg-faded p-5 rounded">
                        <h2 class="section-heading mb-4">
                            <span class="section-heading-upper">ABOUT US...</span>
                            <span class="section-heading-lower">Nuestra Misión</span>
                        </h2>
                        <p class="mb-3">Somos profesionales en el desarrollo y manejo de software, 
                            comprometidos a brindar confianza y mejorar la calidad de vida de nuestros 
                            clientes. Creada para contribuir al desarrollo social de los sistemas clinicos, 
                            ayudando a mostrar sus servicios de alta competitividad, con personal capacitado y  
                            equipos de tecnología que son de vital importancia para la producción de la compañía.</p>
                        <div class="intro-button mx-auto"><a class="btn btn-primary btn-xl" href="#!">LO MEJOR PARA TI!</a></div>
                    </div>
                </div>
            </div>
        </section>
        <section class="page-section cta">
            <div class="container">
                <div class="row">
                    <div class="col-xl-9 mx-auto">
                        <div class="cta-inner bg-faded text-center rounded">
                            <h2 class="section-heading mb-4">
                                <span class="section-heading-upper">Nuestra Visión</span>
                            </h2>
                            <p class="mb-0">Software Corporation tienen como visión impulsar el desarrollo de software 
de alta calidad, satisfaciendo las necesidades de micros, 
medianas y grandes compañías clinicas. Aplicando tecnologías recientes. 
Factores como  la responsabilidad, talento humano e innovación son 
parte fundamentales que complementan los pilares de nuestra organización</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <footer class="footer text-faded text-center py-5">
            <span class="section-heading-upper">Nuestros Valores</span>
            <div class="container"><p class="m-0 small">Realizar nuestro trabajo con la pasión, dedicación y entusiasmo necesario para llevar a cabo nuestra misión.</p></div>
            <div class="container"><p class="m-0 small">Honestidad, para transmitir confianza en todos los ámbitos ajustándonos siempre a la verdad.</p></div>
            <div class="container"><p class="m-0 small">Respeto a nuestros pacientes mejorando tu calidad de vida.</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src={{asset("https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js")}}></script>
        <!-- Core theme JS-->
        <script src={{asset("js/scripts.js")}}></script>
    </body>
</html>
