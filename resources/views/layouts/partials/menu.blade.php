<nav class="pcoded-navbar  ">
    <div class="navbar-wrapper  ">
        <div class="navbar-content scroll-div ">

            <div class="">
                <div class="main-menu-header">
                    <img class="img-radius" src="{{ asset('assets/img/dog.jpg') }}" alt="User-Profile-Image">
                    <div class="user-details">
                        <span style="font-size: 18px;">{{ auth()->user()->name }}</span>
                        <div id="more-details">{{ auth()->user()->email }}<i class="fa fa-chevron-down m-l-5"></i></div>
                    </div>
                </div>
                <div class="collapse" id="nav-user-link">
                    <ul class="list-unstyled">
                        <li class="list-group-item"><a href="user-profile.html"><i
                                    class="feather icon-user m-r-5"></i>Perfil</a></li>
                        <li class="list-group-item"><a href="#!"><i
                                    class="feather icon-settings m-r-5"></i>Configuracion</a></li>
                        <li class="list-group-item"><a href="../view/logout.php "><i
                                    class="feather icon-log-out m-r-5"></i>Cerrar Sesion</a></li>
                    </ul>
                </div>
            </div>

            <ul class="nav pcoded-inner-navbar ">
                <li class="nav-item pcoded-menu-caption">
                    <label>Tienda AJ</label>
                </li>
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}" class="nav-link "><span class="pcoded-micon">
                            <i class="feather icon-home"></i></span><span class="pcoded-mtext">Inicio</span></a>
                </li>

                <li class="nav-item pcoded-menu-caption">
                    <label>Registros</label>
                </li>
                <li class="nav-item pcoded-hasmenu">
                    <a href="#!" class="nav-link "><span class="pcoded-micon">
                        <i class="feather icon-layout"></i></span><span class="pcoded-mtext">Clientes</span></a>
                    <ul class="pcoded-submenu">
                        <li><a href="{{ route('clientes.index') }}">Listar Clientes</a></li>
                        <li><a href="layout-vertical.html">Registrar Cliente</a></li>
                    </ul>
                </li>
                {{-- <li class="nav-item pcoded-hasmenu">
                    <a href="#!" class="nav-link "><span class="pcoded-micon"><i
                                class="feather icon-layout"></i></span><span class="pcoded-mtext">Proveedor</span></a>
                    <ul class="pcoded-submenu">
                        <li><a href="layout-vertical.html">Registrar Proveedor</a></li>
                        <li><a href="layout-horizontal.html">Lista de Proveedores</a></li>
                    </ul>
                </li> --}}
                <li class="nav-item pcoded-hasmenu">
                    <a><span class="pcoded-micon">
                        <i class="feather icon-layout"></i></span><span class="pcoded-mtext">Productos</span></a>
                    <ul class="pcoded-submenu">
                        <li><a href="{{ route('productos.index') }}">Listar Productos</a></li>
                        <li><a href="{{ route('productos.create') }}">Registrar Producto</a></li>
                    </ul>
                </li>
                <li class="nav-item pcoded-hasmenu">
                    <a><span class="pcoded-micon">
                        <i class="feather icon-layout"></i></span><span class="pcoded-mtext">Categorias</span></a>
                    <ul class="pcoded-submenu">
                        <li><a href="{{ route('categorias.index') }}">Listar Categorias</a></li>
                        <li><a href="{{ route('categorias.create') }}">Registrar Categoría</a></li>
                    </ul>
                </li>
                <li class="nav-item pcoded-hasmenu">
                    <a><span class="pcoded-micon">
                        <i class="feather icon-box"></i></span><span class="pcoded-mtext">Ventas</span></a>
                    <ul class="pcoded-submenu">
                        <li><a href="{{ route('ventas.index') }}">Listar Ventas</a></li>
                        <li><a href="{{ route('ventas.create') }}">Registrar Venta</a></li>
                    </ul>
                </li>
                <li class="nav-item pcoded-hasmenu">
                    <a><span class="pcoded-micon">
                        <i class="feather icon-box"></i></span><span class="pcoded-mtext">Compras</span></a>
                    <ul class="pcoded-submenu">
                        <li><a href="bc_alert.html">Registrar Compra</a></li>
                    </ul>
                </li>
                {{-- <li class="nav-item pcoded-menu-caption">
                    <label>Botellas</label>
                </li>
                <li class="nav-item pcoded-hasmenu">
                    <a href="#!" class="nav-link "><span class="pcoded-micon"><i
                                class="feather icon-box"></i></span><span class="pcoded-mtext">Botellas</span></a>
                    <ul class="pcoded-submenu">
                        <li><a href="bc_alert.html">Registrar Botellas</a></li>
                        <li><a href="bc_button.html">Lista de Botellas</a></li>
                        <li><a href="bc_button.html">Lista de Cajas</a></li>
                    </ul>
                </li>
                <li class="nav-item pcoded-menu-caption">
                    <label>Configuracion</label>
                </li>
                <?php //if ($usuarioActivo['rol'] == 'admin') { ?>
                <li class="nav-item pcoded-hasmenu">
                    <a href="#!" class="nav-link "><span class="pcoded-micon"><i
                                class="feather icon-box"></i></span><span class="pcoded-mtext">Usuarios</span></a>
                    <ul class="pcoded-submenu">
                        <li><a href="../controller/usuarioRegistro.php">Registrar Usuarios</a></li>
                        <li><a href="../controller/usuarioLista.php">Lista de Usuarios</a></li>
                    </ul>
                </li>
                <?php //} ?>
                --}}
                <li class="nav-item pcoded-menu-caption">
                    <label>Opciones</label>
                </li>
                <li class="nav-item">
                    <a href="{{ route('logout') }}" class="nav-link "><span class="pcoded-micon">
                        <i class="feather icon-pie-chart"></i></span><span class="pcoded-mtext">Cerrar
                            Sesion</span></a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- [ navigation menu ] end -->
<!-- [ Header ] start -->
<header class="navbar pcoded-header navbar-expand-lg navbar-light header-dark">
    <div class="m-header">
        {{-- botón para reducir el menú lateral --}}
        <a class="mobile-menu" id="mobile-collapse" href="#!"><span></span></a>
        <a href="#!" class="b-brand">
            <!-- ========   change your logo hear   ============ -->
            <img src="{{ asset('assets/img/logo.png') }}" alt="" class="logo">
            <img src="{{ asset('assets/img/logo-icon.png') }}" alt="" class="logo-thumb">
        </a>
        <a href="#!" class="mob-toggler">
            <i class="feather icon-more-vertical"></i>
        </a>
    </div>
    <div class="collapse navbar-collapse">
        <ul class="navbar-nav ml-auto">
            <li>
                <div class="dropdown">
                    <a class="dropdown-toggle" href="#" data-toggle="dropdown">
                        <i class="icon feather icon-bell"></i>
                        <span class="badge badge-pill badge-danger">5</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right notification">
                        <div class="noti-head">
                            <h6 class="d-inline-block m-b-0">Notificaciones</h6>
                            <div class="float-right">
                                <a href="#!" class="m-r-10">Marcar ya leido</a>
                                <a href="#!">Limpiar</a>
                            </div>
                        </div>
                        <ul class="noti-body">
                            <li class="n-title">
                                <p class="m-b-0">Nuevo</p>
                            </li>
                            <li class="notification">
                                <div class="media">
                                    <img class="img-radius" src="{{ asset('assets/img/dog.jpg') }}"
                                        alt="Generic placeholder image">
                                    <div class="media-body">
                                        <p><strong>Usuario</strong><span class="n-time text-muted"><i
                                                    class="icon feather icon-clock m-r-10"></i>5 min</span></p>
                                        <p>Nuevo mensaje</p>
                                    </div>
                                </div>
                            </li>

                        </ul>
                        <div class="noti-footer">
                            <a href="#!">Ver todo</a>
                        </div>
                    </div>
                </div>
            </li>
            <li>
                <div class="dropdown drp-user">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="feather icon-user"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right profile-notification">
                        <div class="pro-head">
                            <img src="{{ asset('assets/img/dog.jpg') }}" class="img-radius" alt="User-Profile-Image">
                            <span>Usuario</span>
                            <a href="../view/logout.php" class="dud-logout" title="Logout">
                                <i class="feather icon-log-out"></i>
                            </a>
                        </div>
                        <ul class="pro-body">
                            <li><a href="user-profile.html" class="dropdown-item"><i class="feather icon-user"></i>
                                    Perfil</a></li>
                            <li><a href="email_inbox.html" class="dropdown-item"><i class="feather icon-mail"></i>
                                    Mensajes</a></li>
                            <li><a href="../view/logout.php" class="dropdown-item"><i class="feather icon-lock"></i>
                                    Cerrar Sesion</a></li>
                        </ul>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</header>