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
                        <a href="/">
                        <img src="{{ asset('/img/logo.png') }}" alt="">
                        </a>
                    </div>
                    <ul class="enlaces navbar-nav  ml-auto mt-2 mt-lg-0 " id="enlaces">
                        <li class="nav-item active">
                            <a href="#inicio" class="">INICIO</a>
                        </li>
                        <li class="nav-item active">
                            <a href="#servicio" class="" >SERVICIO</a>
                        </li>
                        <li class="nav-item active">
                            <a href="#producto" class="">PRODUCTOS</a>
                        </li>
                        <li class="nav-item active">
                            <a href="#opiniones" class="" >OPINIONES</a>
                        </li>
                        <li class="nav-item active">
                            <a href="#nosotros" class="" >NOSOTROS</a>
                        </li>
                        <li class="nav-item active">
                            <a href="#contacto" class="" >CONTACTO</a>
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
                        @endguest
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

            <section class="about-services" id="servicio">
                <div class="contenedor">
                    <h2 class="titulo">SERVICIO</h2>
                    <div class="servicio-cont">
                        <div class="servicio-ind">
                            <img src="{{ asset('/img/dudas.svg') }}" alt="">
                            <h3>Atendemos tus dudas</h3>
                            <p>Atendemos rápidamente cualquier consulta que tengas via chat. No estás sólo, sino que siempre estamos atentos a tus inquietudes.</p>
                        </div>

                        <div class="servicio-ind">
                            <img src="{{ asset('/img/money.svg') }}" alt="">
                            <h3>Pago seguro</h3>
                            <p>Todo pedido que realices será confirmado a travéz de una llamada. Todos los pagos los puedes realizar contra entrega el valor acordado.</p>
                        </div>
                        <div class="servicio-ind">
                            <img src="{{ asset('/img/security.svg') }}" alt="">
                            <h3>Información privada</h3>
                            <p>Los pedidos que realices sólo los conocerás tú a través de tu panel de usuario. Nadie más tiene acceso a esta información.</p>
                        </div>
                    </div>
                </div>
            </section>
            <section class="portafolio" id="producto">
                <div class="contenedor">
                    <h2 class="titulo">CATEGORIA DE LOS PRODUCTOS</h2>
                    <div class="galeria-port">
                    @foreach($categorias as $categoria)
                        <div class="imagen-port">
                            <img src="{{ $categoria->urlcate }}" alt="Categoria Foto">
                            <div class="hover-galeria">
                                <a href="{{ route('categoria.productos', $categoria->id) }}" class="text-center" style="text-decoration: none;">
                                <img src="{{ asset('/img/icono1.png') }}" alt="">
                                <p>{{ $categoria->nombre }}</p>
                                <p class="text-justify" style="padding-left:12px; padding-right: 12px;">{{ $categoria->descripcion }}</p>
                                </a>
                            </div>
                        </div>
                    @endforeach
                    </div>
                </div>
            </section>
            <section class="clientes contenedor" id="opiniones">
                <h2 class="titulo">Qué opinan nuestro clientes</h2>
                <div class="cards">
                    <div class="card">
                        <img src="{{ asset('/img/face1.jpg') }}" alt="">
                        <div class="contenido-textos-card">
                            <h4>Orlando Fuentes</h4>
                            <p>Buena atención... y muy puntuales en la entrega de su trabajo, gracias sigan adelante!</p>
                        </div>
                    </div>
                    <div class="card">
                        <img src="{{ asset('/img/face2.jpg') }}" alt="">
                        <div class="contenido-textos-card">
                            <h4>Juan Ovejero</h4>
                            <p>Gracias por su excelente servicio, buena calidad en sus productos.</p>
                        </div>
                    </div>
                </div>
            </section>
            <section class="contenedor sobre-nosotros" id="nosotros">
                <h2 class="titulo">
                    INFORMACIÓN
                </h2>
                <div class="contenedor-sobre-nosotros row">
                    <img src="{{ asset('/img/portada.svg') }}" alt="img-sobre-nosotros" class="imagen-developer">
                    <div class="contenido-textos col-md-6">
                        <h3><span>1</span> ¿Quiénes somos?</h3>
                        <p>Sport La Comita, somos una empresa lider en el mercado de implemento y artículos deportivos, que buscamos posicionamiento en el estado Boliviano, brindando productos de calidad.</p>

                        <h3><span>2</span> ¿Qué ofrecemos?</h3>
                        <p>La fábrica de ropa "Sport La Comita" ofrece a su distinguida clientela todo tipo de ropa deportiva, como ser: Poleras, cortos, polerones, chaquetas, busos, parkas, chamarras, etc. Con los diseños a gusto del cliente de la mejor calidad.</p>

                        <h3><span>3</span> ¿Por qué esta página web?</h3>
                        <p>Te ofrecemos la facilidad de poder ver nuestros productos, realizar cotizaciones, consultar sobre los ultimos o nuevos diseños, todo eso en está página web.</p>
                    </div>
                </div>
            </section>
            <section class="about-services" id="contacto" >
                <div class="contenedor">
                    <h2 class="titulo">CONTÁCTANOS</h2>
                    <div class="servicio-cont col-lg-12 d-flex align-items-stretch">
                        <div class="col-12 col-lg-6" >
                            <form class="bg-white shadow rounded py-3 px-4 was-validated"
                                method="POST"
                                action="{{ route('smscontactos.store') }}">
                                 @csrf
                                 <div class="form-group">
                                    <label for="nombre">Nombre:</label>
                                    <input class="form-control bg-light shadow-sm {{ $errors->has('nombre') ? ' is-invalid' : 'border-0' }}"
                                        id="nombre"
                                        name="nombre"
                                        placeholder="Ingrese su nombre completo" value="{{ old('nombre') }}" required >
                                    @if ($errors->has('nombre'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('nombre') }}</strong>
                                        </span>
                                    @endif
                                 </div>
                                 <div class="form-group">
                                    <label for="telefono">Celular/Teléfono:</label>
                                    <input class="form-control bg-light shadow-sm {{ $errors->has('telefono') ? ' is-invalid' : 'border-0' }}"
                                        id="telefono"
                                        name="telefono"
                                        placeholder="Ingrese su teléfono o celular." value="{{ old('telefono') }}" type="number" required >
                                    @if ($errors->has('telefono'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('telefono') }}</strong>
                                        </span>
                                    @endif
                                 </div>
                                <div class="form-group">
                                    <label for="email">E-mail:</label>
                                    <input class="form-control bg-light shadow-sm {{ $errors->has('email') ? ' is-invalid' : 'border-0' }}" id="email"
                                        type="email"
                                        name="email"
                                        placeholder="Ingrese su correo eléctronico" value="{{ old('email') }}" required >
                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="contenido">Contenido:</label>
                                    <textarea class="form-control bg-light shadow-sm {{ $errors->has('contenido') ? ' is-invalid' : 'border-0' }}" rows="4" name="contenido" placeholder="Ingrese el contenido de su mensaje" required>{{ old('contenido') }}</textarea>
                                    @if ($errors->has('contenido'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('contenido') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <button type="submit" class="btn colorprin btn-lg btn-block">Enviar</button>
                            </form>
                        </div><hr>
                        <div class="col-12 col-lg-6 shadow embed-responsive embed-responsive-1by1">
                          <iframe class="embed-responsive-item" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d939.7436407343811!2d-65.75643947083583!3d-19.585585699174853!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x93f94e76c52e1119%3A0xed6b59af8ea1b01f!2sOruro%20178%2C%20Villa%20Imperial%20de%20Potos%C3%AD!5e0!3m2!1ses-419!2sbo!4v1570242707496!5m2!1ses-419!2sbo"></iframe>
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
    </body>
</html>
