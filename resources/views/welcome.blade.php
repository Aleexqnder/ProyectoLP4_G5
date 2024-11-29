<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <title>Página principal - MecaMasters</title>

    <link rel="stylesheet" type="text/css" href="{{ asset('bootstrap.css') }}" />
    <link href="{{ asset('build/assets/css/style.css') }}" rel="stylesheet" />
    <link href="{{ asset('build/assets/css/responsive.css') }}" rel="stylesheet" />
    <link rel="shortcut icon" type="image/png" href="{{ asset('build/assets/img/Logo.png') }}" />

  <link rel="shortcut icon" type="image/png" href="{{ asset('build/assets/img/Logo.png') }}" />
</head>

<body>
  <div class="hero_area">
    <!-- header section starts -->
    <header class="header_section">
      <div class="container-fluid">
        <nav class="navbar navbar-expand-lg custom_nav-container ">
          <a class="navbar-brand" href="index.html">
            <span>Meca Masters</span>
          </a>
          <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            @if (Route::has('login'))
              <div class="d-flex ml-auto">
                @auth
                  <a href="{{ url('/dashboard') }}" class="btn btn-primary">Dashboard</a>
                @else
                  <a href="{{ route('login') }}" class="btn btn-primary">Log in</a>
                  @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="btn btn-secondary ml-2">Register</a>
                  @endif
                @endauth
              </div>
            @endif
          </div>
        </nav>
      </div>
    </header>
    <!-- end header section -->
  </div>

  <div class="bg">
    <!-- about section -->
    <section class="about_section layout_padding">
      <div class="container">
        <div class="custom_heading-container">
          <h2>Sobre nuestro taller de mecanica:</h2>
        </div>
        <p>MecaMasters es un proyecto enfocado en brindar soluciones eficientes para la gestión de servicios automotrices. Diseñado para optimizar la organización, seguimiento y administración de reparaciones, cotizaciones y reservaciones, nuestro sistema integra bases de datos robustas y APIs funcionales. Durante este tiempo, hemos trabajado en crear una herramienta que facilite la operatividad diaria del taller, mejorando la experiencia tanto para los clientes como para los empleados.</p>
      </div>
    </section>
    <!-- end about section -->

    <!-- service section -->
    <section class="service_section layout_padding-bottom pink-box">
        <div class="container">
            <div class="custom_heading-container">
            <h3>Nuestros servicios</h3>
            </div>
            <p>
      En nuestro taller de mecánica, ofrecemos soluciones completas para el cuidado y mantenimiento de tu vehículo. Desde diagnósticos precisos y reparaciones especializadas hasta mantenimiento preventivo y gestión de cotizaciones, garantizamos calidad, confianza y atención personalizada en cada servicio. ¡Reserva tu cita y descubre la diferencia!
    </p>
    <div class="service_container">
      <div class="row">
        <div class="col-md-3">
          <div class="box">
            <h3>Diagnóstico y reparación de vehículos</h3>
            <p>Ofrecemos servicios de inspección y reparación para identificar y solucionar fallas mecánicas, eléctricas o de motor de forma eficiente.</p>
          </div>
        </div>
        <div class="col-md-3">
          <div class="box">
            <h3>Mantenimiento preventivo</h3>
            <p>Realizamos cambios de aceite, revisión de frenos, alineación, balanceo y otros servicios para mantener el vehículo en óptimas condiciones.</p>
          </div>
        </div>
        <div class="col-md-3">
          <div class="box">
            <h3>Gestión de cotizaciones</h3>
            <p>Generamos y gestionamos cotizaciones detalladas para reparaciones y servicios, proporcionando transparencia y claridad a los clientes.</p>
          </div>
        </div>
        <div class="col-md-3">
          <div class="box">
            <h3>Reservación de citas</h3>
            <p>Facilitamos la programación de citas para servicios de mantenimiento o reparación, optimizando el tiempo de los clientes y el taller.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

    <!-- end service section -->

    <!-- contact section -->
    <section class="contact_section layout_padding">
      <div class="custom_heading-container">
        <h2>MecaMasters Online / Disponibilidad del servicio:</h2>
      </div>
      <div class="container layout_padding2-top">
        <div class="row">
          <div class="col-md-6 mx-auto">
            <p>Mandanos un mensaje describiendo el tipo de servicio que gustes, y nosotros te contactaremos para darte más de detalles!</p>
            <form action="">
              <div>
                <input type="text" placeholder="Nombre">
              </div>
              <div>
                <input type="email" placeholder="Correo">
              </div>
              <div>
                <input type="text" placeholder="Numero de telefono">
              </div>
              <div>
                <select name="" id="">
                  <option value="" disabled selected>Tipo de servicio</option>
                  <option value="">Service 1</option>
                  <option value="">Service 2</option>
                  <option value="">Service 3</option>
                </select>
              </div>
              <div>
                <input type="text" class="message-box" placeholder="Mensaje">
              </div>
              <div class="d-flex justify-content-center">
                <button>SEND</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
    <!-- end contact section -->

    <!-- info section -->
    <section class="info_section layout_padding">
  <div class="container">
    <div class="row">
      <!-- Información del Taller -->
      <div class="col-md-6">
        <div class="info-logo">
          <h3>MecaMasters</h3>
          <p>
            Nuestro taller ofrece soluciones completas para el mantenimiento y reparación de vehículos, asegurando calidad y confianza en cada servicio. ¡Confía en nosotros para cuidar de tu automóvil!
          </p>
        </div>
      </div>
      <!-- Información de Contacto -->
      <div class="col-md-3">
        <div class="info-contact">
          <h4>Información de Contacto</h4>
          <div class="location">
            <h6>Dirección del Taller:</h6>
            <span>Barrio Central, Avenida Principal #123, Ciudad</span>
          </div>
          <div class="call">
            <h6>Atención al Cliente:</h6>
            <span>(+504 9876-5432)</span>
          </div>
        </div>
      </div>
      <!-- Sección de Enlaces -->
      <div class="col-md-3">
        <div class="discover">
          <h4>Explora</h4>
          <ul>
            <li><a href="#services">Nuestros Servicios</a></li>
            <li><a href="#faq">Preguntas Frecuentes</a></li>
            <li><a href="#contact">Contáctanos</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>

  </div>
</body>
</html>