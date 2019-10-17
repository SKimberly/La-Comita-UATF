<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url('/') }}" class="brand-link text-center">
      <img src="{{ asset('/img/sidebar/comitaicon.svg') }}" alt="AdminLTE Logo" class="brand-image elevation-3"
           style="opacity: .8">
        <span class="brand-text font-weight-light yellow">Sport La Comita</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('img/sidebar/userdefault.svg') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="{{ route('admin.users.show',Auth::user()->id) }}" class="d-block "><b>{{ Auth::user()->fullname }}</b></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{ route('admin') }}" class="nav-link {{ request()->is('admin') ? 'active' : '' }}">
              <img src="{{ asset('img/sidebar/escritorio.svg') }}" alt="" class="nav-icon">
              <p>
                Escritorio
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('admin.users.index') }}" class="nav-link {{ request()->is('admin/users*') ? 'active' : '' }}">
              <img src="{{ asset('img/sidebar/users.svg') }}" alt="usuarios" class="nav-icon">
              <p>
                  Usuarios
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('admin.categorias') }}" class="nav-link {{ request()->is('admin/categorias*') ? 'active' : '' }}">
              <img src="{{ asset('img/sidebar/categorias.svg') }}" alt="categorias" class="nav-icon">
              <p>
                  Categorias
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview {{ request()->is('admin/productos*') ? 'menu-open' : '' }}">
            <a href="#" class="nav-link {{ request()->is('admin/productos*') ? 'active' : '' }}">
              <img src="{{ asset('img/sidebar/producto.svg') }}" alt="usuarios" class="nav-icon">
              <p>
                  Productos
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('admin.productos.index') }}" class="nav-link {{ request()->is('admin/productos') ? 'active' : '' }}">
                  <i class="fas fa-dumpster"></i>
                  <p>Ver lista</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.productos.create') }}" class="nav-link {{ request()->is('admin/productos/crear') ? 'active' : '' }}">
                  <i class="fas fa-share-square"></i>
                  <p>Agregar nuevo</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="{{ route('admin.pedidos.index') }}" class="nav-link {{ request()->is('admin/pedidos*') ? 'active' : '' }}">
              <img src="{{ asset('img/sidebar/pedidos.svg') }}" alt="pedidos" class="nav-icon">
              <p>
                  Pedidos
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview ">
            <a href="#" class="nav-link ">
              <img src="{{ asset('img/sidebar/cotizacion.svg') }}" alt="calendario" class="nav-icon">
              <p>
                  Cotizaciones
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link ">
                  <i class="fas fa-scroll"></i>
                  <p>Ver lista</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="fas fa-cash-register"></i>
                  <p>Agregar nuevo</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview ">
            <a href="#" class="nav-link ">
              <img src="{{ asset('img/sidebar/ventas.svg') }}" alt="calendario" class="nav-icon">
              <p>
                  Ventas
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link ">
                  <i class="nav-icon fas fa-file-invoice-dollar"></i>
                  <p>Ver lista</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-file-signature"></i>
                  <p>Agregar nuevo</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <img src="{{ asset('img/sidebar/calendario.svg') }}" alt="calendario" class="nav-icon">
              <p>
                Calendario
                <span class="right badge badge-success">Date</span>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <img src="{{ asset('img/sidebar/reportes.svg') }}" alt="reportes" class="nav-icon">
              <p>
                Reportes
                <span class="right badge badge-warning">PDF</span>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <img src="{{ asset('img/sidebar/resultados.svg') }}" alt="resportes" class="nav-icon">
              <p>
                Estadisticas
                <span class="right badge badge-primary">G</span>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <img src="{{ asset('img/sidebar/facturas.svg') }}" alt="facturas" class="nav-icon">
              <p>
                Facturaciones
                <span class="right badge badge-danger">Fac</span>
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>