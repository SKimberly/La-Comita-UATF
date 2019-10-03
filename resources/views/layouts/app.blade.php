<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('titulo')</title>

        <meta name="csrf-token" content="{{ csrf_token() }}">

        <link href="https://fonts.googleapis.com/css?family=Kaushan+Script&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="css/style.css">

        <script src="{{ asset('js/app.js') }}" defer></script>

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    </head>
    <body>
    <div id="app">
        <header>
            <nav class="navbar   navbar-expand-lg   shadow-sm">
                <a href="/">INICIO</a>
                <a href="">NOSOTROS</a>
                <a href="">PRODUCTOS</a>
                <a href="">Servicios</a>
                <a href="">Contacto</a>

            </nav>


            <main class="py-4">
                @yield('contentpri')
            </main>

            <div class="holaa" style="height: 150px; overflow: hidden;" ><svg viewBox="0 0 500 150" preserveAspectRatio="none" style="height: 100%; width: 100%;"><path d="M-4.22,54.77 C262.69,157.39 235.04,-24.17 504.79,69.56 L500.00,150.00 L0.00,150.00 Z" style="stroke: none; fill: #fff;"></path></svg></div>
        </header>
        <main>
            <section class="contenedor sobre-nosotros">
                <h2 class="titulo">
                    NUESTROS SERVICIOS
                </h2>
                <div class="contenedor-sobre-nosotros row">
                    <div class="col-md-6" style="background-position: center; background-size:cover">
                        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                              <ol class="carousel-indicators">
                                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                              </ol>
                              <div class="carousel-inner">
                                <div class="carousel-item active">
                                  <img class="d-block img-fluid" src="img/face1.jpg" alt="First slide">
                                </div>
                                <div class="carousel-item">
                                  <img class="d-block img-fluid" src="img/face1.jpg" alt="Second slide">
                                </div>
                                <div class="carousel-item">
                                  <img class="d-block img-fluid" src="img/face1.jpg" alt="Third slide">
                                </div>
                              </div>
                              <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                              </a>
                              <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                              </a>
                            </div>
                    </div>
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
            <section class="about-services">
                <div class="contenedor">
                    <h2 class="titulo">Nuestros Productos</h2>
                    <div class="servicio-cont">
                      <div class="servicio-ind">
                        <div class="card shadow">
                          <div class="card-body">
                            <div style="text-align: center;">
                            <img src="img/99A.jpg" class="img-fluid  w-50"> </div>
                            <h3 class="text-center">John Carter</h3>
                            <p class="text-justify">
                              Dolor modi repudiandae quia beatae consectetur? Nam ullafugit ullam, accusamus! Totam mollitia eveniet!
                            </p> <hr>
                            <div class="d-flex flex-row justify-content-center">
                              <b>Unid.:</b> <span>Bs. 170 </span>
                                <a href="#" class="btn btn-warning btn-sm ml-auto">Ordenar</a>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="servicio-ind">
                        <div class="card shadow">
                          <div class="card-body">
                            <div style="text-align: center;">
                            <img src="img/99A.jpg" class="img-fluid  w-50"> </div>
                            <h3 class="text-center">John Carter</h3>
                            <p class="text-justify">
                              Dolor modi repudiandae quia beatae consectetur? Nam ullafugit ullam, accusamus! Totam mollitia eveniet!
                            </p> <hr>
                            <div class="d-flex flex-row justify-content-center">
                              <b>Unid.:</b> <span>Bs. 170 </span>
                                <a href="#" class="btn btn-warning btn-sm ml-auto">Ordenar</a>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="servicio-ind">
                        <div class="card shadow">
                          <div class="card-body">
                            <div style="text-align: center;">
                            <img src="img/99A.jpg" class="img-fluid  w-50"> </div>
                            <h3 class="text-center">John Carter</h3>
                            <p class="text-justify">
                              Dolor modi repudiandae quia beatae consectetur? Nam ullafugit ullam, accusamus! Totam mollitia eveniet!
                            </p> <hr>
                            <div class="d-flex flex-row justify-content-center">
                              <b>Unid.:</b> <span>Bs. 170 </span>
                                <a href="#" class="btn btn-warning btn-sm ml-auto">Ordenar</a>
                            </div>
                          </div>
                        </div>
                      </div>

                      {{--  <div class="servicio-ind">
                        <div class="card">
                          <div class="card-body">
                            <img src="img/ilustracion2.svg" class="img-fluid w-100">
                            <h3 class="text-center">John Carter</h3>
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

                      <div class="servicio-ind">
                        <div class="card">
                          <div class="card-body">
                            <img src="img/ilustracion2.svg" class="img-fluid w-100">
                            <h3 class="text-center">John Carter</h3>
                            <p class="text-justify">
                              Dolor modi repudiandae quia beatae consectetur? Nam ullafugit ullam, accusamus! Totam mollitia eveniet!
                            </p>
                            <div class="d-flex flex-row justify-content-center">
                              <div class="p-4">
                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                              </div>
                              <div class="p-4">
                                <a href="#"><i class="fab fa-twitter"></i></a>
                              </div>
                              <div class="p-4">
                                <a href="#"><i class="fab fa-instagram"></i></a>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>   --}}

                    </div>
                </div>
            </section>

            <section class="portafolio">
                <div class="contenedor">
                    <h2 class="titulo">Portafolio</h2>
                    <div class="galeria-port">
                        <div class="imagen-port">
                            <img src="img/img1.jpg" alt="">
                            <div class="hover-galeria">
                                <img src="img/icono1.png" alt="">
                                <p>Nuestro trabajo</p>
                            </div>
                        </div>
                        <div class="imagen-port">
                            <img src="img/img2.jpg" alt="">
                            <div class="hover-galeria">
                                <img src="img/icono1.png" alt="">
                                <p>Nuestro trabajo</p>
                            </div>
                        </div>
                        <div class="imagen-port">
                            <img src="img/img3.jpg" alt="">
                            <div class="hover-galeria">
                                <img src="img/icono1.png" alt="">
                                <p>Nuestro trabajo</p>
                            </div>
                        </div>
                        <div class="imagen-port">
                            <img src="img/img4.jpg" alt="">
                            <div class="hover-galeria">
                                <img src="img/icono1.png" alt="">
                                <p>Nuestro trabajo</p>
                            </div>
                        </div>
                        <div class="imagen-port">
                            <img src="img/img5.jpg" alt="">
                            <div class="hover-galeria">
                                <img src="img/icono1.png" alt="">
                                <p>Nuestro trabajo</p>
                            </div>
                        </div>
                        <div class="imagen-port">
                            <img src="img/img6.jpg" alt="">
                            <div class="hover-galeria">
                                <img src="img/icono1.png" alt="">
                                <p>Nuestro trabajo</p>
                            </div>
                        </div>
                        <div class="imagen-port">
                            <img src="img/img7.jpg" alt="">
                            <div class="hover-galeria">
                                <img src="img/icono1.png" alt="">
                                <p>Nuestro trabajo</p>
                            </div>
                        </div>
                        <div class="imagen-port">
                            <img src="img/img8.jpg" alt="">
                            <div class="hover-galeria">
                                <img src="img/icono1.png" alt="">
                                <p>Nuestro trabajo</p>
                            </div>
                        </div>

                    </div>
                </div>
            </section>
            <section class="clientes contenedor">
                <h2 class="titulo">Que NO dicen nuestro clientes</h2>
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
            <section class="about-services">
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
                    <h4>Teléfono</h4>
                    <p>312685161</p>
                </div>
                <div class="content-foo">
                    <h4>E-mail</h4>
                    <p>jorge@gmail.com</p>
                </div>
                <div class="content-foo">
                    <h4>Dirección</h4>
                    <p>312685161</p>
                </div>
            </div>
            <h2 class="titulo-final">&copy; Jorge Peralta | UATF </h2>
        </footer>
        </div>
    </body>
</html>
