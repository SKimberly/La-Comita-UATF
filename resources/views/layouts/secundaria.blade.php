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

        <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
        <script src="{{ asset('js/app.js') }}"></script>
        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        @yield('styles')

    </head>
    <body>
    <div id="app">
        <header id="inicio" class="header-secundario">
            <nav class="contenedor-nav navbar fixed-top  navbar-expand-lg navbar-light shadow-none">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse " id="navbarTogglerDemo01">
                    <div class="logo navbar-brand">
                        <a href="/">
                        <img src="{{ asset('/img/logo.png') }}" alt="">
                        </a>
                    </div>
                    <ul class="enlaces navbar-nav  ml-auto mt-2 mt-lg-0 " id="enlaces">
                        <li class="nav-item active">
                            <a href="#inicio" class="">INICIO</a>
                        </li>
                        @yield('linknavbar')
                        <li class="nav-item active">
                            <a href="/#producto" class="" >VOLVER</a>
                        </li>
                        @guest
                            <li class="nav-item active">
                                <a  href="{{ route('login') }}">{{ __('INGRESAR') }}</a>
                            </li>
                            @if (Route::has('register'))
                              <li class="nav-item active">
                                <a   href="{{ route('register') }}">{{ __('REGISTRARSE') }}</a>
                              </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                    <a href="{{ route('admin') }}" role="button" class="text-white">
                                       {{ strtoupper(Auth::user()->fullname) }}
                                    </a>
                            </li>
                            <li class="nav-item dropdown">
                              <a class="text-white"  href="{{ route('carrito.detalle') }}">
                                <img src="{{ asset('img/sidebar/carrito.svg') }}" alt="pedidos" width="40" class="">
                                @if($nummsj = auth()->user()->carrito->detalles->count())
                                  <span class="badge badge-warning navbar-badge">{{ $nummsj }}</span>
                                @endif
                              </a>
                            </li>

                        @endguest
                    </ul>
                </div>
            </nav>
            <section class="caratula">
                <div class="contenedor">
                    <div class="caratula-cont row">
                        @yield('titproducto')
                    </div>
                </div>
            </section>

            <div class="holaa" style="height: 150px; overflow: hidden;" ><svg viewBox="0 0 500 150" preserveAspectRatio="none" style="height: 100%; width: 100%;"><path d="M-2.25,74.50 C256.20,250.16 247.74,-88.31 502.25,74.50 L500.00,150.00 L0.00,150.00 Z" style="stroke: none; fill: #fff;"></path></svg></div>
        </header>
        <main>

        @yield('contenproducto')

        </main>
        <footer>
            <div class="contenedor-footer">
                <div class="content-foo">
                    <h4>Celular</h4>
                    <p>70462939</p>
                </div>
                <div class="content-foo">
                    <h4>E-mail</h4>
                    <p>sport.lacomita19@gmail.com</p>
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
        <script src="/sweetalert/sweetalert.min.js"></script>
        <!-- ./wrapper -->
        @include('sweet::alert')

        @stack('scripts')

    </body>
</html>
