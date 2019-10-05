<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('titulo')</title>
        <meta name="description" content="Sistema de información bajo plataforma web para el control de ventas, pedidos y cotizaciones para la fabrica de ropa Sport La Comita de la ciudad de Potosí">
        <meta name="author" content="Univ. Silvana Kimberly Marquina Chambi">
        <meta name="keyword" content="Sistema web Sport La Comita">

        <meta name="csrf-token" content="{{ csrf_token() }}">

        <link rel="shortcut icon" href="{{ asset('/img/sport.png') }}" />

        <link rel="stylesheet" href="css/style.css">
        <script src="{{ asset('js/app.js') }}" defer></script>
        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    </head>
    <body>
    <div id="app">
        <header id="inicio">
            <nav class="contenedor-nav navbar fixed-top  navbar-expand-lg navbar-light shadow-none">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse " id="navbarTogglerDemo01">
                    <div class="logo navbar-brand">
                        <img src="{{ asset('/img/logo.png') }}" alt="">
                    </div>
                    <ul class="enlaces navbar-nav  ml-auto mt-2 mt-lg-0 " id="enlaces">
                        <li class="nav-item active">
                            <a href="#inicio" class="">INICIO</a>
                        </li>
                        <li class="nav-item active">
                            <a href="#nosotros" class="" >NOSOTROS</a>
                        </li>
                        <li class="nav-item active">
                            <a href="#productos" class="" >PRODUCTOS</a>
                        </li>
                        <li class="nav-item active">
                            <a href="#servicios" class="" >SERVICIOS</a>
                        </li>
                        <li class="nav-item active">
                            <a href="#opiniones" class="" >OPINIONES</a>
                        </li>
                        <li class="nav-item active">
                            <a href="#contacto" class="" >CONTACTO</a>
                        </li>
                    </ul>
                </div>
            </nav>
            <section class="caratula">

                <div class="contenedor">
                    <div class="caratula-cont row">

                        @yield('contentpri')

                        <div class="caratula-ind col-md-6">
                            <img src="{{ asset('/img/principal.svg') }}" alt="Tienda Comita" >
                        </div>
                    </div>
                </div>
            </section>

            <div class="holaa" style="height: 150px; overflow: hidden;" ><svg viewBox="0 0 500 150" preserveAspectRatio="none" style="height: 100%; width: 100%;"><path d="M-2.25,74.50 C256.20,250.16 247.74,-88.31 502.25,74.50 L500.00,150.00 L0.00,150.00 Z" style="stroke: none; fill: #fff;"></path></svg></div>
        </header>
        <main>
            <section class="contenedor sobre-nosotros" id="nosotros">
                <h2 class="titulo">
                    NUESTROS SERVICIOS
                </h2>
                <div class="contenedor-sobre-nosotros row">
                    <img src="{{ asset('/img/portada.svg') }}" alt="img-sobre-nosotros" class="imagen-developer">
                    <div class="contenido-textos col-md-6">
                        <h3><span>1</span> Los mejores productos</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore vero, perspiciatis doloribus totam beatae provident quo natus consequuntur autem facilis! Sit eius deleniti dicta veritatis quam accusantium nemo modi qui!</p>

                        <h3><span>2</span> Los mejores productos</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore vero, perspiciatis doloribus totam beatae provident quo natus consequuntur autem facilis! Sit eius deleniti dicta veritatis quam accusantium nemo modi qui!</p>

                        <h3><span>3</span> Los mejores productos</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore vero, perspiciatis doloribus totam beatae provident quo natus consequuntur autem facilis! Sit eius deleniti dicta veritatis quam accusantium nemo modi qui!</p>
                    </div>
                </div>
            </section>
            <section class="about-services" id="productos">
                <div class="contenedor">
                    <h2 class="titulo">Nuestros Productos</h2>
                    <div class="servicio-cont col-lg-12 d-flex align-items-stretch">
                        <div class="servicio-ind ">
                            <div class="card shadow">
                              <div class="card-body">
                                <img src="{{ asset('/img/basquet.svg') }}" class="img-fluid w-100">
                                <h3 class="text-center">FUTBOL</h3>
                                <p class="text-justify">
                                  Dolor modi repudiandae quia beatae consectetur? Nam ullafugit ullam, accusamus! Totam mollitia eveniet!
                                </p>
                                <div class="d-flex flex-row justify-content-center">
                                     <span>Bs. 170 </span>

                                    <a href="#" class="btn btn-warning btn-sm ml-auto">Ordenar</a>
                                </div>
                              </div>
                            </div>
                        </div>
                        <div class="servicio-ind ">
                            <div class="card shadow">
                              <div class="card-body">
                                <img src="{{ asset('/img/futbol.svg') }}" class="img-fluid w-100">
                                <h3 class="text-center">FUTBOL</h3>
                                <p class="text-justify">
                                  Dolor modi repudiandae quia beatae consectetur? Nam ullafugit ullam, accusamus! Totam mollitia eveniet!
                                </p>
                                <div class="d-flex flex-row justify-content-center">
                                     <span>Bs. 170 </span>

                                    <a href="#" class="btn btn-warning btn-sm ml-auto">Ordenar</a>
                                </div>
                              </div>
                            </div>
                        </div>
                        <div class="servicio-ind ">
                            <div class="card shadow">
                              <div class="card-body">
                                <img src="{{ asset('/img/gim.svg') }}" class="img-fluid w-100">
                                <h3 class="text-center">GIMNACSIO</h3>
                                <p class="text-justify">
                                  Dolor modi repudiandae quia beatae consectetur? Nam ullafugit ullam, accusamus! Totam mollitia eveniet!
                                </p>
                                <div class="d-flex flex-row justify-content-center">
                                     <span>Bs. 170 </span>

                                    <a href="#" class="btn btn-warning btn-sm ml-auto">Ordenar</a>
                                </div>
                              </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="portafolio" id=servicios>
                <div class="contenedor">
                    <h2 class="titulo">Portafolio</h2>
                    <div class="galeria-port">
                        <div class="imagen-port">
                            <img src="{{ asset('/img/portafolio/port1.png') }}" alt="">
                            <div class="hover-galeria">
                                <img src="img/icono1.png" alt="">
                                <p>Nuestro trabajo</p>
                            </div>
                        </div>
                        <div class="imagen-port">
                            <img src="{{ asset('/img/portafolio/port2.png') }}" alt="">
                            <div class="hover-galeria">
                                <img src="img/icono1.png" alt="">
                                <p>Nuestro trabajo</p>
                            </div>
                        </div>
                        <div class="imagen-port">
                            <img src="{{ asset('/img/portafolio/port3.png') }}" alt="">
                            <div class="hover-galeria">
                                <img src="img/icono1.png" alt="">
                                <p>Nuestro trabajo</p>
                            </div>
                        </div>
                        <div class="imagen-port">
                            <img src="{{ asset('/img/portafolio/port4.png') }}" alt="">
                            <div class="hover-galeria">
                                <img src="img/icono1.png" alt="">
                                <p>Nuestro trabajo</p>
                            </div>
                        </div>
                        <div class="imagen-port">
                            <img src="{{ asset('/img/portafolio/port5.png') }}" alt="">
                            <div class="hover-galeria">
                                <img src="img/icono1.png" alt="">
                                <p>Nuestro trabajo</p>
                            </div>
                        </div>
                        <div class="imagen-port">
                            <img src="{{ asset('/img/portafolio/port6.png') }}" alt="">
                            <div class="hover-galeria">
                                <img src="img/icono1.png" alt="">
                                <p>Nuestro trabajo</p>
                            </div>
                        </div>
                        <div class="imagen-port">
                            <img src="{{ asset('/img/portafolio/port7.png') }}" alt="">
                            <div class="hover-galeria">
                                <img src="img/icono1.png" alt="">
                                <p>Nuestro trabajo</p>
                            </div>
                        </div>
                        <div class="imagen-port">
                            <img src="{{ asset('/img/portafolio/port8.png') }}" alt="">
                            <div class="hover-galeria">
                                <img src="img/icono1.png" alt="">
                                <p>Nuestro trabajo</p>
                            </div>
                        </div>

                    </div>
                </div>
            </section>
            <section class="clientes contenedor" id="opiniones">
                <h2 class="titulo">Qué dicen nuestro clientes</h2>
                <div class="cards">
                    <div class="card">
                        <img src="img/face1.jpg" alt="">
                        <div class="contenido-textos-card">
                            <h4>Jorge Peralta</h4>
                            <p>Lorem ipsum laboriosam, repellat odit voluptatem ipsum laboriosam, repellat odit voluptatem!</p>
                        </div>
                    </div>
                    <div class="card">
                        <img src="img/face2.jpg" alt="">
                        <div class="contenido-textos-card">
                            <h4>Silvana marquina</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur  ipsum laboriosam, repellat odit volupt atemvo luptatem!</p>
                        </div>
                    </div>
                </div>
            </section>
            <section class="about-services" id="contacto">
                <div class="contenedor">
                    <h2 class="titulo">Nuestros servicios</h2>
                    <div class="servicio-cont">
                        <div class="servicio-ind">
                            <img src="img/ilustracion1.svg" alt="">
                            <h3>Marcos andia</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore quisquam iu e officia quibusdam provident perspiciatis, deserunt similique! Sapiente, corporis.</p>
                        </div>

                        <div class="servicio-ind">
                            <img src="img/ilustracion2.svg" alt="">
                            <h3>Marcos andia</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore quisquam iusto officia quibusdam provident perspiciatis, deserunt similique! Sapiente, corporis.</p>
                        </div>
                        <div class="servicio-ind">
                            <img src="img/ilustracion3.svg" alt="">
                            <h3>Marcos andia</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore quisquam iust officia quibusdam provident perspiciatis, deserunt similique! Sapiente, corporis.</p>

                        </div>
                    </div>
                </div>
            </section>

        </main>
        <footer>
            <div class="contenedor-footer">
                <div class="content-foo">
                    <h4>Celular</h4>
                    <p>70462939</p>
                </div>
                <div class="content-foo">
                    <h4>E-mail</h4>
                    <p>jorge@gmail.com</p>
                </div>
                <div class="content-foo">
                    <h4>Dirección (Tienda)</h4>
                    <p>Calle Oruro Nro. 184</p>
                </div>
                <div class="content-foo">
                    <h4>Dirección (Taller)</h4>
                    <p>Calle América esq. San Alberto</p>
                </div>
            </div>
            <h2 class="titulo-final">&copy; S. Kimberly Marquina Ch. | UATF Potosí </h2>
        </footer>
        </div>
    </body>
</html>
