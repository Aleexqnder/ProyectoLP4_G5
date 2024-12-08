<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">   
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página principal - MecaMasters</title>

    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
    
    <link href="{{ asset('build/assets/css/style.css') }}" rel="stylesheet" />
    <link href="{{ asset('build/assets/css/responsive.css') }}" rel="stylesheet" />
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Kalam:wght@700&family=Raleway:wght@400;700&display=swap"
        rel="stylesheet">
    
    <script src="{{ asset('js/modernizr.js') }}"></script>
</head>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light container-fluid py-3 position-fixed">
    <div class="container">
        <!-- Botón Toggler para dispositivos móviles -->
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"
            aria-controls="offcanvasNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Offcanvas Navbar -->
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar"
            aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Menú</h5>
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                    aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <!-- Menú de Navegación -->
                <ul class="navbar-nav align-items-center justify-content-start flex-grow-1 pe-3">
                    <li class="nav-item">
                        <a class="nav-link active px-3" aria-current="page" href="#hero">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link px-3" href="#services">Servicios</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link px-3" href="#testimonial">Opiniones</a>
                        <li class="nav-item">
                        <a class="nav-link px-3" href="#pricing">Precios</a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link px-3" href="#faq">Preguntas</a>
                    </li>
                </ul>

                <!-- Botones de Login y Registro -->
                                <div class="d-flex mt-5 mt-lg-0 ps-xl-5 align-items-center justify-content-end">
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        @if (Route::has('login'))
                            <div class="d-flex ml-auto">
                                @auth
                                    <a href="{{ url('/dashboard') }}" class="btn btn-primary custom-btn">Dashboard</a>
                                @else
                                    <a href="{{ route('login') }}" class="btn btn-primary custom-btn">Log in</a>
                                    @if (Route::has('register'))
                                        <a href="{{ route('register') }}" class="btn btn-secondary custom-btn ml-3">Register</a>
                                    @endif
                                @endauth
                            </div>
                        @endif
                    </div>
                </div>
                
                <style>
                .custom-btn {
                    margin-left: 20px;
                    padding: 5px 15px; /* Reducir el padding */
                    border-radius: 5px; /* Reducir el borde redondeado */
                    font-size: 14px; /* Reducir el tamaño de fuente */
                    background-color: transparent; /* Fondo transparente */
                    border: 1px solid; /* Agregar borde */
                }
                
                .custom-btn.btn-primary {
                    border-color: #007bff; /* Color del borde */
                    color: #007bff; /* Color del texto */
                }
                
                .custom-btn.btn-primary:hover {
                    background-color: #007bff; /* Fondo al pasar el mouse */
                    color: #fff; /* Color del texto al pasar el mouse */
                }
                
                .custom-btn.btn-secondary {
                    border-color: #6c757d; /* Color del borde */
                    color: #6c757d; /* Color del texto */
                }
                
                .custom-btn.btn-secondary:hover {
                    background-color: #6c757d; /* Fondo al pasar el mouse */
                    color: #fff; /* Color del texto al pasar el mouse */
                }
                </style>
            </div>
        </div>
    </div>
</nav>

<!-- Sección Hero -->
<section id="hero" class="position-relative overflow-hidden">
    <div class="pattern-overlay pattern-right position-absolute">
        <img src="{{ asset('Build/assets/img/hero-pattern-right.png') }}" alt="pattern">
    </div>
    <div class="pattern-overlay pattern-left position-absolute">
    <img src="{{ asset('Build/assets/img/hero-pattern-left.png') }}" alt="pattern">
    </div>
        <div class="hero-content container text-center">
        <div class="row">
            <div class="detail mb-4">
                <h1><span class="text-primary no-transform">MecaMasters</span></h1>
                <br>
                <p class="hero-paragraph">
                    MecaMasters es un proyecto enfocado en brindar soluciones eficientes para la gestión de servicios automotrices. Diseñado para optimizar la organización, seguimiento y administración de reparaciones, cotizaciones y reservaciones, nuestro sistema integra bases de datos robustas y APIs funcionales. Durante este tiempo, hemos trabajado en crear una herramienta que facilite la operatividad diaria del taller, mejorando la experiencia tanto para los clientes como para los empleados.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Sección Sobre Nuestro Taller -->
<section id="search">
    <div class="container search-block p-5" style="border: 1px solid rgba(255, 255, 255, 0.5); background-color: rgba(13, 13, 13, 0.404);">
        <div class="custom_heading-container">
            <h3>Sobre nuestro taller de mecánica</h3>
        </div>
        <p>MecaMasters ofrece soluciones eficientes para la gestión de servicios automotrices, optimizando la organización, seguimiento y administración de reparaciones, cotizaciones y reservaciones.</p>
    </div>
</section>

<body>
    <!-- Aquí comienza el contenido adaptado -->

    <!-- Sección de Procesos -->
    <section id="services">
        <br>
        <div class="process-content container">
            <h2 class="text-center my-5 pb-5">Nuestros <span class="text-primary">servicios</span></h2>
            <hr class="progress-line">
            <div class="row process-block">
                <div class="col-6 col-lg-3 text-start my-4">
                    <div class="bullet"></div>
                    <h5 class="text-uppercase mt-5">Diagnóstico y reparación de vehículos</h5>
                    <p>Ofrecemos servicios de inspección y reparación para identificar y solucionar fallas mecánicas, eléctricas o de motor de forma eficiente.</p>
                </div>
    
                <div class="col-6 col-lg-3 text-start my-4">
                    <div class="bullet"></div>
                    <h5 class="text-uppercase mt-5">Mantenimiento preventivo</h5>
                    <p>Realizamos cambios de aceite, revisión de frenos, alineación, balanceo y otros servicios para mantener el vehículo en óptimas condiciones.</p>
                </div>
    
                <div class="col-6 col-lg-3 text-start my-4">
                    <div class="bullet"></div>
                    <h5 class="text-uppercase mt-5">Gestión de cotizaciones</h5>
                    <p>Generamos y gestionamos cotizaciones detalladas para reparaciones y servicios, proporcionando transparencia y claridad a los clientes.</p>
                </div>
    
                <div class="col-6 col-lg-3 text-start my-4">
                    <div class="bullet"></div>
                    <h5 class="text-uppercase mt-5">Reservación de citas</h5>
                    <p>Facilitamos la programación de citas para servicios de mantenimiento o reparación, optimizando el tiempo de los clientes y el taller.</p>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Sección de Testimonios -->
    <section id="testimonial" class="position-relative">
        <div class="pattern-overlay pattern-left position-absolute">
        <img src="{{ asset('Build/assets/img/testimonial-pattern.png') }}" alt="pattern">

        </div>
        <div class="container my-5 py-5">
            <div class="custom_heading-container text-center">
            <h2 class="text-primary">Opiniones</span></h2>
            </div>
            <div class="swiper testimonial-swiper">
                <div class="swiper-wrapper">
                    <div class="swiper-slide text-center">
                        <div class="offset-2 col-8">
                            <iconify-icon icon="mdi:format-quote-open" class="testimonial-icon"></iconify-icon>
                            <p class="testimonial-paragraph">Excelente servicio y atención personalizada. Mi vehículo quedó como nuevo. ¡Recomendado!</p>
                            <h5>Juan Pérez</h5>
                        </div>
                    </div>
                    <div class="swiper-slide text-center">
                        <div class="offset-2 col-8">
                            <iconify-icon icon="mdi:format-quote-open" class="testimonial-icon"></iconify-icon>
                            <p class="testimonial-paragraph">Muy profesionales y rápidos en la reparación. Sin duda volveré.</p>
                            <h5>María López</h5>
                        </div>
                    </div>
                    <div class="swiper-slide text-center">
                        <div class="offset-2 col-8">
                            <iconify-icon icon="mdi:format-quote-open" class="testimonial-icon"></iconify-icon>
                            <p class="testimonial-paragraph">El mejor taller de la ciudad. Atención de primera y precios justos.</p>
                            <h5>Carlos García</h5>
                        </div>
                    </div>
                    <div class="swiper-slide text-center">
                        <div class="offset-2 col-8">
                            <iconify-icon icon="mdi:format-quote-open" class="testimonial-icon"></iconify-icon>
                            <p class="testimonial-paragraph">Muy satisfecho con el servicio. Personal amable y capacitado.</p>
                            <h5>Ana Martínez</h5>
                        </div>
                    </div>
                </div>
               
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
        </div>
    </section>
    
    <!-- Sección de Precios -->
    <section id="pricing">
        <div class="container py-5 my-5">
            <h2 class="text-center my-5">Nuestros <span class="text-primary">precios</span></h2>
    
            <div class="row py-4">
                <div class="col-lg-3 col-sm-6 col-12 pb-4">
                    <div class="pricing-detail py-5 text-center">
                        <div class="pricing-content">
                            <h5>Diagnóstico y reparación</h5>
                            <div class="content pt-2">
                                <h3>L. 1,500.00</h3>
                            </div>
                            <div class="pt-4">
                                <p>✓ Inspección completa</p>
                                <p>✓ Reparación de fallas mecánicas</p>
                                <p>✓ Reparación de fallas eléctricas</p>
                                <p>✓ Reparación de motor</p>
                            </div>
                        </div>
                          <div class="pricing-button">
                            <button class="btn btn-success">Elegir Servicio</button>
                         </div>
                    </div>
                </div>
    
                <div class="col-lg-3 col-sm-6 col-12 pb-4">
                    <div class="pricing-detail py-5 text-center">
                        <div class="pricing-content">
                            <h5>Mantenimiento preventivo</h5>
                            <div class="content pt-2">
                                <h3>L. 800.00</h3>
                            </div>
                            <div class="pt-4">
                                <p>✓ Cambio de aceite</p>
                                <p>✓ Revisión de frenos</p>
                                <p>✓ Alineación y balanceo</p>
                                <p>✓ Otros servicios preventivos</p>
                            </div>
                        </div>
                        <div class="pricing-button">
                            <button class="btn btn-success">Elegir Servicio</button>
                         </div>
                    </div>
                </div>
    
                <div class="col-lg-3 col-sm-6 col-12 pb-4">
                    <div class="pricing-detail py-5 text-center">
                        <div class="pricing-content">
                            <h5>Gestión de cotizaciones</h5>
                            <div class="content pt-2">
                                <h3>L. 500.00</h3>
                            </div>
                            <div class="pt-4">
                                <p>✓ Cotizaciones detalladas</p>
                                <p>✓ Transparencia en precios</p>
                                <p>✓ Claridad para el cliente</p>
                            </div>
                        </div>
                        <div class="pricing-button">
                            <button class="btn btn-success">Elegir Servicio</button>
                         </div>
                    </div>
                </div>
    
                <div class="col-lg-3 col-sm-6 col-12 pb-4">
                    <div class="pricing-detail py-5 text-center">
                        <div class="pricing-content">
                            <h5>Reservación de citas</h5>
                            <div class="content pt-2">
                                <h3>L. 300.00</h3>
                            </div>
                            <div class="pt-4">
                                <p>✓ Programación de citas</p>
                                <p>✓ Optimización del tiempo</p>
                                <p>✓ Servicio personalizado</p>
                            </div>
                        </div>
                        <div class="pricing-button">
                            <button class="btn btn-success">Elegir Servicio</button>
                         </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Sección FAQ -->
    <section id="faq">
        <div class="container my-5 py-5">
            <h2 class="text-center my-5">Preguntas y <span class="text-primary">Respuestas</span></h2>
            <div class="faq-content col-md-8 offset-md-2">
                <div class="faq-item mt-4">
                    <h3 class="faq-question">¿Por qué elegir MecaMasters para la reparación de tu vehículo?</h3>
                    <p class="faq-answer">Nuestro taller cuenta con técnicos altamente capacitados y equipos de última generación para garantizar reparaciones precisas y eficientes. Nos comprometemos con la satisfacción del cliente y la calidad en cada servicio.</p>
                </div>
                <hr>
                <div class="faq-item mt-4">
                    <h3 class="faq-question">¿Cómo puedo agendar una cita para mantenimiento preventivo?</h3>
                    <p class="faq-answer">Agendar una cita es muy sencillo. Puedes llamarnos al +504 11321218, enviarnos un correo electrónico a <a href="mailto:MecaMasters@gmail.com">MecaMasters@gmail.com</a> o utilizar nuestro formulario en línea en el sitio web para elegir la fecha y hora que mejor te convenga.</p>
                </div>
                <hr>
                <div class="faq-item mt-4">
                    <h3 class="faq-question">¿Qué servicios de mantenimiento ofrecen?</h3>
                    <p class="faq-answer">Ofrecemos una amplia gama de servicios de mantenimiento, incluyendo cambio de aceite, revisión de frenos, alineación y balanceo, revisiones eléctricas, diagnóstico de motores y mucho más. Nos adaptamos a las necesidades específicas de tu vehículo.</p>
                </div>
                <hr>
                <!-- Puedes añadir más preguntas y respuestas según sea necesario -->
            </div>
        </div>
    </section>
    
    <!-- Sección Footer -->
        <section id="footer">
        <div class="container footer-container mt-5">
            <footer class="row my-5 py-5">
                <div class="col-md-12 mt-5 mt-md-0 text-center">
                  <p class="py-3">Bienvenido a MecaMasters, tu socio confiable en soluciones automotrices. Nos dedicamos a ofrecer servicios de alta calidad para mantener tu vehículo en óptimas condiciones.</p>
                    <div class="d-flex justify-content-center align-items-center">
                        <a href="#" target="_blank"><iconify-icon class="social-link-icon pe-4" icon="mdi:facebook"></iconify-icon></a>
                        <a href="#" target="_blank"><iconify-icon class="social-link-icon pe-4" icon="mdi:twitter"></iconify-icon></a>
                        <a href="#" target="_blank"><iconify-icon class="social-link-icon pe-4" icon="mdi:instagram"></iconify-icon></a>
                        <a href="#" target="_blank"><iconify-icon class="social-link-icon pe-4" icon="mdi:linkedin"></iconify-icon></a>
                        <a href="#" target="_blank"><iconify-icon class="social-link-icon pe-4" icon="mdi:youtube"></iconify-icon></a>
                    </div>
                </div>
            </footer>
        </div>
        <footer class="d-flex flex-wrap justify-content-between align-items-center border-top"></footer>
        <div class="container">
                  <footer class="d-flex flex-wrap justify-content-center align-items-center py-2 pt-4">
                <div class="text-center">
                    <p>© 2024 MecaMasters - All rights reserved</p>
                </div>
            </footer>
        </div>
    </section>
    
    <!-- Scripts -->
    <script src="{{ asset('js/jquery-1.11.0.min.js') }}"></script>
    <script src="{{ asset('js/plugins.js') }}"></script>
    <script src="{{ asset('js/script.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.7/dist/iconify-icon.min.js"></script>
    <script>
    document.addEventListener('DOMContentLoaded', function () {
    var swiper = new Swiper('.testimonial-swiper', {
        loop: true,
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
    });
});
</script>
    

</body>

</html>