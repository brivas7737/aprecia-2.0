<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>APRECIA</title>
        <link rel="icon" href="{{ asset('aprecia.ico') }}">
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand" href="#page-top">

<img
    src="{{ asset('assets/img/logoamarillo.png') }}"
    alt="APRECIA"
    style="
        height:120px;
    ">
</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars ms-1"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">

    <li class="nav-item">
        <a class="nav-link" href="#page-top">
            Inicio
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="#services">
            Servicios
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="#portfolio">
            Programas
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="#about">
            Historia
        </a>
    </li>

    <li class="nav-item">
    <a class="nav-link" href="#equipo">
        Nuestro Equipo
    </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="#contact">
            Contacto
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link"
           href="{{ route('login') }}"
           style="
                background:#d90429;
                color:white !important;
                border-radius:25px;
                padding:10px 20px;
                margin-left:10px;
           ">
            Iniciar Sesión
        </a>
    </li>

</ul>
                </div>
            </div>
        </nav>
        <!-- Masthead-->
<header class="masthead" style="position:relative; overflow:hidden;">

    <video
        autoplay
        muted
        loop
        playsinline
        style="
            position:absolute;
            top:0;
            left:0;
            width:100%;
            height:100%;
            object-fit:cover;
            z-index:0;
        ">
        <source src="{{ asset('video/fondo.mp4') }}" type="video/mp4">
    </video>

    <div
        style="
            position:absolute;
            top:0;
            left:0;
            width:100%;
            height:100%;
            background:rgba(0,0,0,0.45);
            z-index:1;
        ">
    </div>

    <div class="container" style="position:relative; z-index:2;">

        <div class="masthead-subheading">
            Centro de Educación Especial
        </div>

        <div class="masthead-heading text-uppercase">
            Bienvenido a APRECIA
        </div>

    </div>

</header>
        <!-- Services-->
        <section class="page-section" id="services">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Servicios</h2>
                    <h3 class="section-subheading text-muted">El Centro de Educación Especial ofrece una amplia gama de servicios dedicados a la atención y educación de personas con discapacidad visual.</h3>
                </div>
                <div class="row text-center">
                    <div class="col-md-4">
                        <span class="fa-stack fa-4x">
                            <i class="fas fa-circle fa-stack-2x text-primary"></i>
                            <i class="fas fa-user-graduate fa-stack-1x fa-inverse"></i>
                        </span>
                        <h4 class="my-3">Atención Especializada</h4>
                        <p class="text-muted">Brindamos apoyo educativo integral a niños, adolescentes y jóvenes con discapacidad visual, promoviendo su desarrollo académico y personal.</p>
                    </div>
                    <div class="col-md-4">
                        <span class="fa-stack fa-4x">
                            <i class="fas fa-circle fa-stack-2x text-primary"></i>
                            <i class="fas fa-book-reader fa-stack-1x fa-inverse"></i>
                        </span>
                        <h4 class="my-3">Biblioteca y Recursos Accesibles</h4>
                        <p class="text-muted">Disponemos de materiales educativos adaptados y recursos accesibles que facilitan el aprendizaje y fortalecen la inclusión educativa.</p>
                    </div>
                    <div class="col-md-4">
                        <span class="fa-stack fa-4x">
                            <i class="fas fa-circle fa-stack-2x text-primary"></i>
                            <i class="fas fa-users fa-stack-1x fa-inverse"></i>
                        </span>
                        <h4 class="my-3">Orientación y Apoyo Familiar</h4>
                        <p class="text-muted">Acompañamos a las familias mediante orientación y seguimiento para fortalecer el proceso educativo y la autonomía de los estudiantes.</p>
                    </div>
                </div>
            </div>
        </section>
        <!-- Portfolio Grid-->
        <section class="page-section bg-light" id="portfolio">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Programas</h2>
                    <h3 class="section-subheading text-muted">Programas y servicios desarrollados para apoyar la educación y el desarrollo integral de personas con discapacidad visual.</h3>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-sm-6 mb-4">
                        <!-- Portfolio item 1-->
                        <div class="portfolio-item">
                            <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal1">
                                <div class="portfolio-hover">
                                    <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                                </div>
                                <img class="img-fluid" src="assets/img/atencion-temprana.jpeg" alt="..." />
                            </a>
                            <div class="portfolio-caption">
                                <div class="portfolio-caption-heading">Atención Temprana</div>
                                <div class="portfolio-caption-subheading text-muted">Desarrollo Sensorial y Psicomotriz</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6 mb-4">
                        <!-- Portfolio item 2-->
                        <div class="portfolio-item">
                            <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal2">
                                <div class="portfolio-hover">
                                    <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                                </div>
                                <img class="img-fluid" src="assets/img/portfolio/2.jpg" alt="..." />
                            </a>
                            <div class="portfolio-caption">
                                <div class="portfolio-caption-heading">Apoyo Educativo</div>
                                <div class="portfolio-caption-subheading text-muted">Inclusión Escolar</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6 mb-4">
                        <!-- Portfolio item 3-->
                        <div class="portfolio-item">
                            <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal3">
                                <div class="portfolio-hover">
                                    <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                                </div>
                                <img class="img-fluid" src="assets/img/portfolio/3.jpg" alt="..." />
                            </a>
                            <div class="portfolio-caption">
                                <div class="portfolio-caption-heading">Rehabilitación Funcional</div>
                                <div class="portfolio-caption-subheading text-muted">Autonomía Personal</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6 mb-4 mb-lg-0">
                        <!-- Portfolio item 4-->
                        <div class="portfolio-item">
                            <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal4">
                                <div class="portfolio-hover">
                                    <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                                </div>
                                <img class="img-fluid" src="assets/img/portfolio/4.jpg" alt="..." />
                            </a>
                            <div class="portfolio-caption">
                                <div class="portfolio-caption-heading">Baja Visión</div>
                                <div class="portfolio-caption-subheading text-muted">Atención Especializada</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6 mb-4 mb-sm-0">
                        <!-- Portfolio item 5-->
                        <div class="portfolio-item">
                            <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal5">
                                <div class="portfolio-hover">
                                    <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                                </div>
                                <img class="img-fluid" src="assets/img/portfolio/5.jpg" alt="..." />
                            </a>
                            <div class="portfolio-caption">
                                <div class="portfolio-caption-heading">Tecnología Accesible</div>
                                <div class="portfolio-caption-subheading text-muted">Computación Inclusiva</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <!-- Portfolio item 6-->
                        <div class="portfolio-item">
                            <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal6">
                                <div class="portfolio-hover">
                                    <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                                </div>
                                <img class="img-fluid" src="assets/img/portfolio/6.jpeg" alt="..." />
                            </a>
                            <div class="portfolio-caption">
                                <div class="portfolio-caption-heading">Familia y Comunidad</div>
                                <div class="portfolio-caption-subheading text-muted">Orientación y Participación</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- About-->
        <section class="page-section" id="about">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Historia</h2>
                    <h3 class="section-subheading text-muted">31 años de compromiso con la educación, la inclusión y el desarrollo integral de personas con discapacidad visual.</h3>
                </div>
                <ul class="timeline">
                    <li>
                        <div class="timeline-image"><img class="rounded-circle img-fluid" src="assets/img/about/1.1.jpeg" alt="..." /></div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <h4>11 de Junio de 1995</h4>
                                <h4 class="subheading">Fundación de APRECIA</h4>
                            </div>
                            <div class="timeline-body"><p class="text-muted">El Centro de Educación Especial APRECIA inicia sus actividades en la ciudad de La Paz con el objetivo de brindar atención educativa especializada a personas con discapacidad visual.</p></div>
                        </div>
                    </li>
                    <li class="timeline-inverted">
                        <div class="timeline-image"><img class="rounded-circle img-fluid" src="assets/img/about/1.2.jpg" alt="..." /></div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <h4></h4>
                                <h4 class="subheading">Crecimiento Institucional</h4>
                            </div>
                            <div class="timeline-body"><p class="text-muted">A lo largo de los años, APRECIA amplía sus servicios de habilitación, rehabilitación y apoyo educativo, consolidándose como una institución referente en la atención a personas con discapacidad visual.</p></div>
                        </div>
                    </li>
                    <li>
                        <div class="timeline-image"><img class="rounded-circle img-fluid" src="assets/img/about/1.3.jpg" alt="..." /></div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <h4></h4>
                                <h4 class="subheading">Inclusión Educativa</h4>
                            </div>
                            <div class="timeline-body"><p class="text-muted">Se fortalece el servicio de Apoyo Técnico Pedagógico para acompañar a estudiantes con discapacidad visual incluidos en unidades educativas regulares del Sistema Educativo Plurinacional.</p></div>
                        </div>
                    </li>
                    <li class="timeline-inverted">
                        <div class="timeline-image"><img class="rounded-circle img-fluid" src="assets/img/about/1.4.jpg" alt="..." /></div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <h4>2026</h4>
                                <h4 class="subheading">XXXI Aniversario</h4>
                            </div>
                            <div class="timeline-body"><p class="text-muted">APRECIA celebra 31 años de servicio institucional reafirmando su compromiso con la inclusión, la equidad y el acceso a una educación de calidad para personas con discapacidad visual.</p></div>
                        </div>
                    </li>
                    <li class="timeline-inverted">
                        <div class="timeline-image">
                            <h4>
                                31 Años
                                <br />
                                de Servicio y
                                <br />
                                Compromiso
                            </h4>
                        </div>
                    </li>
                </ul>
            </div>
        </section>
        <!-- Team-->
        <section class="page-section bg-light" id="team">
            <div id="equipo" class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Nuestro Equipo</h2>
                    <h3 class="section-subheading text-muted">Profesionales comprometidos con la educación, inclusión y desarrollo integral de personas con discapacidad visual.</h3>
                    <div style="margin-top:-30px;"></div>
                </div>
<div class="row justify-content-center">

    <div class="col-lg-10 text-center">

        <img
    src="{{ asset('assets/img/equipo-aprecia.jpg') }}"
    alt="Equipo APRECIA"
    class="img-fluid"
    style="
        border-radius:25px;
        box-shadow:0 10px 30px rgba(0,0,0,.25);
        border:8px solid white;
        max-height:700px;
        margin-top:-20px;
    ">
    </div>
</div>
                <div class="row">
                    <div class="col-lg-8 mx-auto text-center"><p class="text-muted mt-3"
   style="
      font-size:18px;
      line-height:1.8;
      max-width:900px;
      margin:auto;
   ">El Centro de Educación Especial APRECIA La Paz cuenta con un equipo multidisciplinario comprometido con la atención educativa especializada, la rehabilitación, la inclusión y el acompañamiento integral de personas con discapacidad visual.</p></div>
                </div>
            </div>
        </section>
<!-- Contacto -->
<section class="page-section" id="contact">
    <div class="container">

        <div class="text-center">
            <h2 class="section-heading text-uppercase">Contáctanos</h2>

            <h3 class="section-subheading text-muted">
                Estamos disponibles para brindar información sobre nuestros programas y servicios educativos.
            </h3>
        </div>

        <div class="row justify-content-center">

            <div class="col-lg-8">

                <div
                    class="text-center p-5"
                    style="
                        background: rgba(255,255,255,0.05);
                        border-radius:20px;
                        border:1px solid rgba(255,255,255,0.1);
                    "
                >

                    <h4 class="text-white mb-4">
                        Centro de Educación Especial APRECIA - La Paz
                    </h4>

                    <p class="text-white mb-3">

    <a
        href="https://maps.app.goo.gl/y4Rk4t7ARJFgVyRW7"
        target="_blank"
        style="
            color:white;
            text-decoration:none;
        ">

        📍 Calle Pichincha esquina Ingavi,
        Edificio Cáritas Bolivia, 3er piso

    </a>

</p>

                    <p class="text-white mb-3">
                        📞 77203659 - 78760703
                    </p>

                    <p class="text-white mb-3">
                        📧 ceeaprecialp@gmail.com
                    </p>

<p class="text-white mb-0">
    📘 Facebook:
    <a
        href="https://www.facebook.com/share/1Dp7aERb4g/?mibextid=wwXIfr"
        target="_blank"
        style="color:#ffcc00; text-decoration:none;">

        APRECIA La Paz

    </a>
</p>
                </div>

            </div>

        </div>

    </div>
</section>

<!-- Footer -->
<footer class="footer py-4">

    <div class="container">

        <div class="row align-items-center">

            <div class="col-lg-6 text-lg-start">
                Centro de Educación Especial APRECIA - LA PAZ © 2026
            </div>

            <div class="col-lg-6 text-lg-end">

<a
    class="btn btn-dark btn-social mx-2"
    href="https://www.facebook.com/share/1Dp7aERb4g/?mibextid=wwXIfr
    target="_blank">

    <i class="fab fa-facebook-f"></i>

</a>

            </div>

        </div>

    </div>

</footer>
        <!-- Portfolio Modals-->
        <!-- Portfolio item 1 modal popup-->
        <div class="portfolio-modal modal fade" id="portfolioModal1" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="close-modal" data-bs-dismiss="modal"><img src="assets/img/close-icon.svg" alt="Close modal" /></div>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <div class="modal-body">
                                    <!-- Project details-->
                                    <h2 class="text-uppercase">Atención Temprana</h2>
                                    <p class="item-intro text-muted">Desarrollo Sensorial y Psicomotriz</p>
                                    <img class="img-fluid d-block mx-auto" src="assets/img/atencion-temprana.jpeg" alt="..." />
                                    <p>Programa dirigido a niños y niñas en edades tempranas para fortalecer el desarrollo sensorial, psicomotriz, cognitivo y social mediante actividades adaptadas.</p>
                                    <button class="btn btn-primary btn-xl text-uppercase" data-bs-dismiss="modal" type="button">
                                        <i class="fas fa-xmark me-1"></i>
                                        Cerrar Programa
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Portfolio item 2 modal popup-->
        <div class="portfolio-modal modal fade" id="portfolioModal2" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="close-modal" data-bs-dismiss="modal"><img src="assets/img/close-icon.svg" alt="Close modal" /></div>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <div class="modal-body">
                                    <!-- Project details-->
                                    <h2 class="text-uppercase">Apoyo Educativo</h2>
                                    <p class="item-intro text-muted">Inclusión Escolar</p>
                                    <img class="img-fluid d-block mx-auto" src="assets/img/portfolio/2.jpg" alt="..." />
                                    <p>Aprestamiento y apoyo a los procesos educativos regulares para favorecer la inclusión y permanencia de estudiantes con discapacidad visual.</p>
                                    <button class="btn btn-primary btn-xl text-uppercase" data-bs-dismiss="modal" type="button">
                                        <i class="fas fa-xmark me-1"></i>
                                        Cerrar Programa
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Portfolio item 3 modal popup-->
        <div class="portfolio-modal modal fade" id="portfolioModal3" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="close-modal" data-bs-dismiss="modal"><img src="assets/img/close-icon.svg" alt="Close modal" /></div>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <div class="modal-body">
                                    <!-- Project details-->
                                    <h2 class="text-uppercase">Rehabilitación Funcional</h2>
                                    <p class="item-intro text-muted">Autonomía Personal</p>
                                    <img class="img-fluid d-block mx-auto" src="assets/img/portfolio/3.jpg" alt="..." />
                                    <p>Desarrollo de habilidades que permiten mejorar la independencia, orientación, movilidad y participación activa de los estudiantes.</p>
                                    <button class="btn btn-primary btn-xl text-uppercase" data-bs-dismiss="modal" type="button">
                                        <i class="fas fa-xmark me-1"></i>
                                        Cerrar Programa
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Portfolio item 4 modal popup-->
        <div class="portfolio-modal modal fade" id="portfolioModal4" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="close-modal" data-bs-dismiss="modal"><img src="assets/img/close-icon.svg" alt="Close modal" /></div>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <div class="modal-body">
                                    <!-- Project details-->
                                    <h2 class="text-uppercase">Baja Visión</h2>
                                    <p class="item-intro text-muted">Atención Especializada</p>
                                    <img class="img-fluid d-block mx-auto" src="assets/img/portfolio/4.jpg" alt="..." />
                                    <p>Evaluación y acompañamiento de personas con baja visión mediante estrategias y recursos que potencian el aprovechamiento del resto visual.</p>
                                    <button class="btn btn-primary btn-xl text-uppercase" data-bs-dismiss="modal" type="button">
                                        <i class="fas fa-xmark me-1"></i>
                                        Cerrar Programa
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Portfolio item 5 modal popup-->
        <div class="portfolio-modal modal fade" id="portfolioModal5" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="close-modal" data-bs-dismiss="modal"><img src="assets/img/close-icon.svg" alt="Close modal" /></div>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <div class="modal-body">
                                    <!-- Project details-->
                                    <h2 class="text-uppercase">Tecnología Accesible</h2>
                                    <p class="item-intro text-muted">Computación Inclusiva</p>
                                    <img class="img-fluid d-block mx-auto" src="assets/img/portfolio/5.jpg" alt="..." />
                                    <p>Capacitación en computación y uso de tecnologías accesibles que facilitan el acceso a la información y la comunicación.</p>
                                    <button class="btn btn-primary btn-xl text-uppercase" data-bs-dismiss="modal" type="button">
                                        <i class="fas fa-xmark me-1"></i>
                                        Cerrar Programa
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Portfolio item 6 modal popup-->
        <div class="portfolio-modal modal fade" id="portfolioModal6" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="close-modal" data-bs-dismiss="modal"><img src="assets/img/close-icon.svg" alt="Close modal" /></div>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <div class="modal-body">
                                    <!-- Project details-->
                                    <h2 class="text-uppercase">Familia y Comunidad</h2>
                                    <p class="item-intro text-muted">Orientación y Participación</p>
                                    <img class="img-fluid d-block mx-auto" src="assets/img/portfolio/6.jpeg" alt="..." />
                                    <p>Espacios de orientación, formación y participación dirigidos a familias y comunidad para fortalecer el apoyo educativo y social de los estudiantes.</p>
                                    <button class="btn btn-primary btn-xl text-uppercase" data-bs-dismiss="modal" type="button">
                                        <i class="fas fa-xmark me-1"></i>
                                        Cerrar Programa
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- * *                               SB Forms JS                               * *-->
        <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    </body>
</html>
