<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>@yield('titulo')</title>

  <meta name="description" content="Sistema de información bajo plataforma web para el control de ventas, pedidos y cotizaciones para la fabrica de ropa Sport La Comita de la ciudad de Potosí">
  <meta name="author" content="Univ. Silvana Kimberly Marquina Chambi">
  <meta name="keyword" content="Sistema web Sport La Comita">

  <meta name="csrf-token" content="{{ csrf_token() }}">

  <link rel="shortcut icon" href="{{ asset('/img/sport.png') }}" />

    <!-- Scripts -->
  <script src="{{ asset('js/app.js') }}" ></script>

  <!-- Styles -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">



</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper" id="app">

  <!-- Navbar -->
      @include('parciales.navbar')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
      @include('parciales.sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @yield('cabecera')
    <!-- /.content-header -->

    <!-- Main content -->
    <main class="py-4">
        @yield('content')
    </main>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
      @include('parciales.footer')

</div>


<script src="/sweetalert/sweetalert.min.js"></script>
<!-- ./wrapper -->
@include('sweet::alert')

@stack('scripts')

</body>
</html>
