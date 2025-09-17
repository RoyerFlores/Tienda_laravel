<?php
include_once("verify.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Tienda AJ</title>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="" />
    <meta name="keywords" content="">
    <meta name="author" content="Phoenixcoded" />
    <!-- Favicon icon -->
    <link rel="icon" href="../assets/images/favicon.ico" type="image/x-icon">

    <!-- vendor css -->
    <link rel="stylesheet" href="../assets/css/style.css">
    
    

</head>
<body class="">
	<!-- [ Pre-loader ] start -->
	<div class="loader-bg">
		<div class="loader-track">
			<div class="loader-fill"></div>
		</div>
	</div>
	<!-- [ Pre-loader ] End -->
	<!-- [ navigation menu ] start -->
	<nav class="pcoded-navbar  ">
		<div class="navbar-wrapper  ">
			<div class="navbar-content scroll-div " >
				
				<div class="">
					<div class="main-menu-header">
						<img class="img-radius" src="../assets/images/user/avatar-2.jpg" alt="User-Profile-Image">
						<div class="user-details">
							<span style="font-size: 18px;"><?php echo $usuarioActivo['usuario']?></span>
							<div id="more-details"><?php echo $usuarioActivo['rol']?><i class="fa fa-chevron-down m-l-5"></i></div>
						</div>
					</div>
					<div class="collapse" id="nav-user-link">
						<ul class="list-unstyled">
							<li class="list-group-item"><a href="user-profile.html"><i class="feather icon-user m-r-5"></i>Perfil</a></li>
							<li class="list-group-item"><a href="#!"><i class="feather icon-settings m-r-5"></i>Configuracion</a></li>
							<li class="list-group-item"><a href="../view/logout.php "><i class="feather icon-log-out m-r-5"></i>Cerrar Sesion</a></li>
						</ul>
					</div>
				</div>
				
				<ul class="nav pcoded-inner-navbar ">
					<li class="nav-item pcoded-menu-caption">
						<label>Tienda AJ</label>
					</li>
					<li class="nav-item">
					    <a href="../view/index.php" class="nav-link "><span class="pcoded-micon"><i class="feather icon-home"></i></span><span class="pcoded-mtext">Inicio</span></a>
					</li>
					<li class="nav-item">
					    <a href="index.html" class="nav-link "><span class="pcoded-micon"><i class="feather icon-home"></i></span><span class="pcoded-mtext">Reportes</span></a>
					</li>
					
					<li class="nav-item pcoded-menu-caption">
						<label>Registros</label>
					</li>
                    <li class="nav-item pcoded-hasmenu">
					    <a href="#!" class="nav-link "><span class="pcoded-micon"><i class="feather icon-layout"></i></span><span class="pcoded-mtext">Clientes</span></a>
					    <ul class="pcoded-submenu">
					        <li><a href="layout-vertical.html" target="_blank">Registrar Cliente</a></li>
					        <li><a href="layout-horizontal.html" target="_blank">Lista de Clientes</a></li>
					    </ul>
					</li>
                    <li class="nav-item pcoded-hasmenu">
					    <a href="#!" class="nav-link "><span class="pcoded-micon"><i class="feather icon-layout"></i></span><span class="pcoded-mtext">Proveedor</span></a>
					    <ul class="pcoded-submenu">
					        <li><a href="layout-vertical.html" target="_blank">Registrar Proveedor</a></li>
					        <li><a href="layout-horizontal.html" target="_blank">Lista de Proveedores</a></li>
					    </ul>
					</li>
                    <li class="nav-item pcoded-hasmenu">
					    <a href="#!" class="nav-link "><span class="pcoded-micon"><i class="feather icon-layout"></i></span><span class="pcoded-mtext">Productos</span></a>
					    <ul class="pcoded-submenu">
					        <li><a href="layout-vertical.html" target="_blank">Registrar Producto</a></li>
					        <li><a href="layout-horizontal.html" target="_blank">Lista de Productos</a></li>
					    </ul>
					</li>
                    <li class="nav-item pcoded-hasmenu">
					    <a href="#!" class="nav-link "><span class="pcoded-micon"><i class="feather icon-layout"></i></span><span class="pcoded-mtext">Categorias</span></a>
					    <ul class="pcoded-submenu">
					        <li><a href="layout-vertical.html" target="_blank">Registrar Categorias</a></li>
					        <li><a href="layout-horizontal.html" target="_blank">Lista de Categorias</a></li>
					    </ul>
					</li>
					<li class="nav-item pcoded-hasmenu">
						<a href="#!" class="nav-link "><span class="pcoded-micon"><i class="feather icon-box"></i></span><span class="pcoded-mtext">Ventas</span></a>
						<ul class="pcoded-submenu">
							<li><a href="bc_alert.html">Registrar Venta</a></li>
							<li><a href="bc_button.html">Lista de Ventas</a></li>
						</ul>
					</li>
					<li class="nav-item pcoded-hasmenu">
						<a href="#!" class="nav-link "><span class="pcoded-micon"><i class="feather icon-box"></i></span><span class="pcoded-mtext">Compras</span></a>
						<ul class="pcoded-submenu">
							<li><a href="bc_alert.html">Registrar Compra</a></li>
							<li><a href="bc_button.html">Lista de Compras</a></li>
						</ul>
					</li>
					<li class="nav-item pcoded-menu-caption">
					    <label>Botellas</label>
					</li>
                    <li class="nav-item pcoded-hasmenu">
						<a href="#!" class="nav-link "><span class="pcoded-micon"><i class="feather icon-box"></i></span><span class="pcoded-mtext">Botellas</span></a>
						<ul class="pcoded-submenu">
							<li><a href="bc_alert.html">Registrar Botellas</a></li>
							<li><a href="bc_button.html">Lista de Botellas</a></li>
							<li><a href="bc_button.html">Lista de Cajas</a></li>
						</ul>
					</li>
					<li class="nav-item pcoded-menu-caption">
					    <label>Configuracion</label>
					</li>
			<?php if($usuarioActivo['rol']=='admin'){ ?>
					<li class="nav-item pcoded-hasmenu">
						<a href="#!" class="nav-link "><span class="pcoded-micon"><i class="feather icon-box"></i></span><span class="pcoded-mtext">Usuarios</span></a>
						<ul class="pcoded-submenu">
							<li><a href="../controller/usuarioRegistro.php">Registrar Usuarios</a></li>
							<li><a href="../controller/usuarioLista.php">Lista de Usuarios</a></li>
						</ul>
					</li>
			<?php } ?>
                    
					<li class="nav-item">
					    <a href="../view/logout.php" class="nav-link "><span class="pcoded-micon"><i class="feather icon-pie-chart"></i></span><span class="pcoded-mtext">Cerrar Sesion</span></a>
					</li>
					
				
			</div>
		</div>
	</nav>
	<!-- [ navigation menu ] end -->
	<!-- [ Header ] start -->
	<header class="navbar pcoded-header navbar-expand-lg navbar-light header-dark">
		
			
				<div class="m-header">
					<a class="mobile-menu" id="mobile-collapse" href="#!"><span></span></a>
					<a href="#!" class="b-brand">
						<!-- ========   change your logo hear   ============ -->
						<img src="../assets/images/logo.png" alt="" class="logo">
						<img src="../assets/images/logo-icon.png" alt="" class="logo-thumb">
					</a>
					<a href="#!" class="mob-toggler">
						<i class="feather icon-more-vertical"></i>
					</a>
				</div>
				<div class="collapse navbar-collapse">
					<ul class="navbar-nav mr-auto">
						<li class="nav-item">
							<a href="#!" class="pop-search"><i class="feather icon-search"></i></a>
							<div class="search-bar">
								<input type="text" class="form-control border-0 shadow-none" placeholder="Search hear">
								<button type="button" class="close" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
						</li>
						
						<li class="nav-item">
							<div class="dropdown mega-menu">
								<a class="dropdown-toggle h-drop" href="#" data-toggle="dropdown">
									COMPRA
								</a>
								<div class="dropdown-menu profile-notification ">
									<div class="row no-gutters">
										<div class="col">
											<h6 class="mega-title">Comprar Producto</h6><br>
											<h6 class="mega-title">Productos - Categoria</h6>
											<ul class="pro-body">
												<li><a href="#!" class="dropdown-item"><i class="fas fa-circle"></i> Abarrotes</a></li>
												<li><a href="#!" class="dropdown-item"><i class="fas fa-circle"></i> Bebidas</a></li>
												<li><a href="#!" class="dropdown-item"><i class="fas fa-circle"></i> Golosinas</a></li>
												<li><a href="#!" class="dropdown-item"><i class="fas fa-circle"></i> Higiene Personal</a></li>
												<li><a href="#!" class="dropdown-item"><i class="fas fa-circle"></i> Cigarros</a></li>
												<li><a href="#!" class="dropdown-item"><i class="fas fa-circle"></i> Limpieza y Aseo del Hogar</a></li>
												<li><a href="#!" class="dropdown-item"><i class="fas fa-circle"></i> Lacteos</a></li>
											</ul>
										</div>
										
									</div>
								</div>
							</div>
						</li>
						<li class="nav-item">
							<div class="dropdown mega-menu">
								<a class="dropdown-toggle h-drop" href="#" data-toggle="dropdown">
									VENTA
								</a>
								<div class="dropdown-menu profile-notification ">
									<div class="row no-gutters">
										<div class="col">
											<h6 class="mega-title">Vender Producto</h6><br>
											<h6 class="mega-title">Productos - Categoria</h6>
											<ul class="pro-body">
												<li><a href="#!" class="dropdown-item"><i class="fas fa-circle"></i> Abarrotes</a></li>
												<li><a href="#!" class="dropdown-item"><i class="fas fa-circle"></i> Bebidas</a></li>
												<li><a href="#!" class="dropdown-item"><i class="fas fa-circle"></i> Golosinas</a></li>
												<li><a href="#!" class="dropdown-item"><i class="fas fa-circle"></i> Higiene Personal</a></li>
												<li><a href="#!" class="dropdown-item"><i class="fas fa-circle"></i> Cigarros</a></li>
												<li><a href="#!" class="dropdown-item"><i class="fas fa-circle"></i> Limpieza y Aseo del Hogar</a></li>
												<li><a href="#!" class="dropdown-item"><i class="fas fa-circle"></i> Lacteos</a></li>
											</ul>
										</div>
										
									</div>
								</div>
							</div>
						</li>
					</ul>
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
												<img class="img-radius" src="../assets/images/user/avatar-1.jpg" alt="Generic placeholder image">
												<div class="media-body">
													<p><strong>Usuario</strong><span class="n-time text-muted"><i class="icon feather icon-clock m-r-10"></i>5 min</span></p>
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
										<img src="../assets/images/user/avatar-1.jpg" class="img-radius" alt="User-Profile-Image">
										<span>Usuario</span>
										<a href="../view/logout.php" class="dud-logout" title="Logout">
											<i class="feather icon-log-out"></i>
										</a>
									</div>
									<ul class="pro-body">
										<li><a href="user-profile.html" class="dropdown-item"><i class="feather icon-user"></i> Perfil</a></li>
										<li><a href="email_inbox.html" class="dropdown-item"><i class="feather icon-mail"></i> Mensajes</a></li>
										<li><a href="../view/logout.php" class="dropdown-item"><i class="feather icon-lock"></i> Cerrar Sesion</a></li>
									</ul>
								</div>
							</div>
						</li>
					</ul>
				</div>
				
			
	</header>
	<!-- [ Header ] end -->
	
	
