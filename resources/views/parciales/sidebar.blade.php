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
        <div class="info ">
          <a href="{{ route('admin.users.show',Auth::user()->id) }}" class="text-center" ><b>Perfil: ({{ Auth::user()->roles->first()->name }})</b> </a>
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
            @can('view', auth()->user())
              <a href="{{ route('admin.users.index') }}" class="nav-link {{ request()->is('admin/users*') ? 'active' : '' }}">
                <img src="{{ asset('img/sidebar/users.svg') }}" alt="usuarios" class="nav-icon">
                <p>
                    Usuarios
                </p>
              </a>
            @endcan
          </li>
          @can('view', auth()->user())
            <li class="nav-item has-treeview {{ request()->is('admin/categorias*') || request()->is('admin/tallas*') || request()->is('admin/materiales*') ? 'menu-open' : '' }}">
              <a href="#" class="nav-link {{ request()->is('admin/categorias*') || request()->is('admin/tallas*') || request()->is('admin/materiales*') ? 'active' : '' }}">
                <img src="{{ asset('img/sidebar/otros.svg') }}" alt="complementos" class="nav-icon">
                <p>
                    Complementos
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ route('admin.categorias') }}" class="nav-link {{ request()->is('admin/categorias') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-sitemap"></i>
                    <p>Categorias</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ route('tallas.index') }}" class="nav-link {{ request()->is('admin/tallas') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-sort-numeric-up"></i>
                    <p>Tallas</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ route('materiales.index') }}" class="nav-link {{ request()->is('admin/materiales') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-tshirt"></i>
                    <p>Materiales</p>
                  </a>
                </li>
              </ul>
            </li>
          @endcan
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
              @can('view', auth()->user())
                <li class="nav-item">
                  <a href="{{ route('admin.productos.create') }}" class="nav-link {{ request()->is('admin/productos/create') ? 'active' : '' }}">
                    <i class="fas fa-share-square"></i>
                    <p>Agregar nuevo</p>
                  </a>
                </li>
              @endcan
            </ul>
          </li>
          <li class="nav-item">
            <a href="{{ route('carrito.detalle') }}" class="nav-link {{ request()->is('carrito/detalle*') ? 'active' : '' }}">
              <img src="{{ asset('img/sidebar/carrito.svg') }}" alt="carrito" class="nav-icon">
              <p>
                  Carrito
                  @if($nummsj = auth()->user()->carrito->detalles->count())
                      <span class="right badge badge-warning">{{ $nummsj }}</span>
                  @endif
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('cotizaciones.index') }}" class="nav-link {{ request()->is('admin/cotizaciones*') ? 'active' : '' }}">
              <img src="{{ asset('img/sidebar/cotizacion.svg') }}" alt="pedidos" class="nav-icon">
              <p>
                  Cotizaciones
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('pedidos.index') }}" class="nav-link {{ request()->is('admin/pedidos*') ? 'active' : '' }}">
              <img src="{{ asset('img/sidebar/pedidos.svg') }}" alt="pedidos" class="nav-icon">
              <p>
                  Pedidos
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('ventas.index') }}" class="nav-link {{ request()->is('admin/ventas*') ? 'active' : '' }}">
              <img src="{{ asset('img/sidebar/ventas.svg') }}" alt="categorias" class="nav-icon">
              <p>
                  Ventas
              </p>
            </a>
          </li>
          @can('view', auth()->user())
              <li class="nav-item">
                <a href="{{ route('calendarios.index') }}" class="nav-link {{ request()->is('admin/calendarios*') ? 'active' : '' }}">
                  <img src="{{ asset('img/sidebar/calendario.svg') }}" alt="calendario" class="nav-icon">
                  <p>
                    Calendario
                    <span class="right badge badge-success">FECHA</span>
                  </p>
                </a>
              </li>
              {{--  <li class="nav-item">
                <a href="#" class="nav-link">
                  <img src="{{ asset('img/sidebar/reportes.svg') }}" alt="reportes" class="nav-icon">
                  <p>
                    Reportes
                    <span class="right badge badge-warning">PDF</span>
                  </p>
                </a>
              </li> --}}
              <li class="nav-item">
                <a href="{{ route('estadisticas.index') }}" class="nav-link {{ request()->is('admin/estadisticas*') ? 'active' : '' }}">
                  <img src="{{ asset('img/sidebar/resultados.svg') }}" alt="resportes" class="nav-icon">
                  <p>
                    Estadisticas
                    <span class="right badge badge-primary">GRÁFICA</span>
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('recibos.index') }}" class="nav-link {{ request()->is('admin/recibos*') ? 'active' : '' }}">
                  <img src="{{ asset('img/sidebar/facturas.svg') }}" alt="facturas" class="nav-icon">
                  <p>
                    Recibos
                    <span class="right badge badge-danger">PDF</span>
                  </p>
                </a>
              </li>
          @endcan
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>