<?Php
session_start();
    if(isset($_SESSION['ADMIN'])){
    $nombre=$_SESSION['ADMIN'];
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Products</title>
	<link rel="stylesheet" href="../css/normalize.css">
	<link rel="stylesheet" href="../css/sweetalert2.css">
	<link rel="stylesheet" href="../css/material.min.css">
	<link rel="stylesheet" href="../css/material-design-iconic-font.min.css">
	<link rel="stylesheet" href="../css/jquery.mCustomScrollbar.css">
	<link rel="stylesheet" href="../css/main.css">
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<script>window.jQuery || document.write('<script src="../js/jquery-1.11.2.min.js"><\/script>')</script>
	<script src="../js/material.min.js" ></script>
	<script src="../js/sweetalert2.min.js" ></script>
	<script src="../js/jquery.mCustomScrollbar.concat.min.js" ></script>
	<script src="../js/main.js"></script>
	<script src="../js/ingreso.js"></script>
</head>
<body>
	<!-- Notifications area -->
	<section class="full-width container-notifications">
		<div class="full-width container-notifications-bg btn-Notification"></div>
	    <section class="NotificationArea">
	        <div class="full-width text-center NotificationArea-title tittles">Notificationes <i class="zmdi zmdi-close btn-Notification"></i></div>
			<ul id="noti1" style="list-style: none;">
				
			</ul>
	    </section>
	</section>
	<!-- navBar -->
	<div class="full-width navBar">
		<div class="full-width navBar-options">
			<i class="zmdi zmdi-more-vert btn-menu" id="btn-menu"></i>	
			<div class="mdl-tooltip" for="btn-menu">Menu</div>
			<nav class="navBar-options-list">
				<ul class="list-unstyle">
					<li class="btn-Notification" id="notifications">
						<i id="notify" class="zmdi zmdi-notifications"></i>
						<!-- <i class="zmdi zmdi-notifications-active btn-Notification" id="notifications"></i> -->
						<div class="mdl-tooltip" for="notifications">Notificaciones</div>
					</li>
					<li class="btn-exit" id="btn-exit">
						<i class="zmdi zmdi-power"></i>
						<div class="mdl-tooltip" for="btn-exit">Salir Sesion</div>
					</li>
					<li class="text-condensedLight noLink" ><small><?php echo $nombre; ?></small></li>
					<li class="noLink">
						<figure>
							<img src="../assets/img/avatar-male.png" alt="Avatar" class="img-responsive">
						</figure>
					</li>
				</ul>
			</nav>
		</div>
	</div>
	<!-- navLateral -->
	<section class="full-width navLateral">
		<div class="full-width navLateral-bg btn-menu"></div>
		<div class="full-width navLateral-body">
			<div class="full-width navLateral-body-logo text-center tittles">
				<i class="zmdi zmdi-close btn-menu"></i> Sistema Inventarios
			</div>
			<figure class="full-width" style="height: 77px;">
				<div class="navLateral-body-cl">
					<img src="../assets/img/avatar-male.png" alt="Avatar" class="img-responsive">
				</div>
				<figcaption class="navLateral-body-cr hide-on-tablet">
					<span>
						<?php echo $nombre; ?><br>
						<small>Administrador</small>
					</span>
				</figcaption>
			</figure>
			<div class="full-width tittles navLateral-body-tittle-menu">
				<i class="zmdi zmdi-desktop-mac"></i><span class="hide-on-tablet">&nbsp; MENU PRINCIPAL</span>
			</div>
			<nav class="full-width">
				<ul class="full-width list-unstyle menu-principal">
					<li class="full-width">
						<a href="home.php" class="full-width">
							<div class="navLateral-body-cl">
								<i class="zmdi zmdi-view-dashboard"></i>
							</div>
							<div class="navLateral-body-cr hide-on-tablet">
								INICIO
							</div>
						</a>
					</li>
					<li class="full-width">
						<a href="empresa.php" class="full-width">
							<div class="navLateral-body-cl">
								<i class="zmdi zmdi-balance"></i>
							</div>
							<div class="navLateral-body-cr hide-on-tablet">
								EMPRESA
							</div>
						</a>
					</li>
					<li class="full-width divider-menu-h"></li>
					<li class="full-width">
						<a href="providers.php" class="full-width">
							<div class="navLateral-body-cl">
								<i class="zmdi zmdi-truck"></i>
							</div>
							<div class="navLateral-body-cr hide-on-tablet">
								PROVEEDORES
							</div>
						</a>
					</li>
					<li class="full-width divider-menu-h"></li>
					<li class="full-width">
						<a href="#!" class="full-width btn-subMenu">
							<div class="navLateral-body-cl">
								<i class="zmdi zmdi-face"></i>
							</div>
							<div class="navLateral-body-cr hide-on-tablet">
								USUARIOS
							</div>
							<span class="zmdi zmdi-chevron-left"></span>
						</a>
						<ul class="full-width menu-principal sub-menu-options">
							<li class="full-width">
								<a href="admin.php" class="full-width">
									<div class="navLateral-body-cl">
										<i class="zmdi zmdi-account"></i>
									</div>
									<div class="navLateral-body-cr hide-on-tablet">
										ADMINISTRADORES
									</div>
								</a>
							</li>
							<li class="full-width">
								<a href="client.php" class="full-width">
									<div class="navLateral-body-cl">
										<i class="zmdi zmdi-accounts"></i>
									</div>
									<div class="navLateral-body-cr hide-on-tablet">
										CLIENTES
									</div>
								</a>
							</li>
						</ul>
					</li>
					

					<li class="full-width">
						<a href="#!" class="full-width btn-subMenu">
							<div class="navLateral-body-cl">
								<i class="zmdi zmdi-face"></i>
							</div>
							<div class="navLateral-body-cr hide-on-tablet">
								ALMACENES
							</div>
							<span class="zmdi zmdi-chevron-left"></span>
						</a>
						<ul class="full-width menu-principal sub-menu-options">
							<li class="full-width">
								<a href="productos.php" class="full-width">
									<div class="navLateral-body-cl">
										<i class="zmdi zmdi-washing-machine"></i>
									</div>
									<div class="navLateral-body-cr hide-on-tablet">
										PRODUCTOS
									</div>
								</a>
							</li>
							<li class="full-width">
								<a href="ingreso.php" class="full-width">
									<div class="navLateral-body-cl">
										<i class="zmdi zmdi-washing-machine"></i>
									</div>
									<div class="navLateral-body-cr hide-on-tablet">
										INGRESO DE PRODUCTOS
									</div>
								</a>
							</li>
							<li class="full-width">
								<a href="inventory.php" class="full-width">
									<div class="navLateral-body-cl">
										<i class="zmdi zmdi-store"></i>
									</div>
									<div class="navLateral-body-cr hide-on-tablet">
										INVENTARIO
									</div>
								</a>
							</li>
						</ul>
					</li>


					<li class="full-width divider-menu-h"></li>
					<li class="full-width">
						<a href="#!" class="full-width btn-subMenu">
							<div class="navLateral-body-cl">
								<i class="zmdi zmdi-face"></i>
							</div>
							<div class="navLateral-body-cr hide-on-tablet">
								SERVICIOS
							</div>
							<span class="zmdi zmdi-chevron-left"></span>
						</a>
						<ul class="full-width menu-principal sub-menu-options">
							<!--<li class="full-width">
								<a href="services.php" class="full-width">
									<div class="navLateral-body-cl">
										<i class="zmdi zmdi-widgets"></i>
									</div>
									<div class="navLateral-body-cr hide-on-tablet">
										Tipo de Servicio
									</div>
								</a>
							</li>-->	
							<li class="full-width">
								<a href="servicios.php" class="full-width">
									<div class="navLateral-body-cl">
										<i class="zmdi zmdi-accounts"></i>
									</div>
									<div class="navLateral-body-cr hide-on-tablet">
										Servicios
									</div>
								</a>
							</li>
							<li class="full-width">
								<a href="service.php" class="full-width">
									<div class="navLateral-body-cl">
										<i class="zmdi zmdi-accounts"></i>
									</div>
									<div class="navLateral-body-cr hide-on-tablet">
										Registrar Servicios
									</div>
								</a>
							</li>
						</ul>
					</li>
					<li class="full-width divider-menu-h"></li>
					<li class="full-width">
						<a href="sales.php" class="full-width">
							<div class="navLateral-body-cl">
								<i class="zmdi zmdi-shopping-cart"></i>
							</div>
							<div class="navLateral-body-cr hide-on-tablet">
								VENTAS
							</div>
						</a>
					</li>
					<li class="full-width divider-menu-h"></li>
				</ul>
			</nav>
		</div>
	</section>
	<!-- pageContent -->
	<section class="full-width pageContent">
		<div class="mdl-tabs mdl-js-tabs mdl-js-ripple-effect">
			<div class="mdl-tabs__tab-bar">
				<a href="#tabNewProduct1" class="mdl-tabs__tab is-active">PRODUCTOS EN ALMACEN</a>
				<a href="#tabNewProduct" class="mdl-tabs__tab">LISTA DE INGRESOS</a>
				<a href="#tabListProducts" class="mdl-tabs__tab">REGISTRAR INGRESO</a>
			</div>

			<div class="mdl-tabs__panel is-active" id="tabNewProduct1">
				<div class="mdl-grid">
					<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--12-col-desktop">
						<form action="#">
							<div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable">
								<label class="mdl-button mdl-js-button mdl-button--icon" for="searchProduct">
									<i class="zmdi zmdi-search"></i>
								</label>
								<div class="mdl-textfield__expandable-holder">
									<input class="mdl-textfield__input" type="text" id="searchProduct">
									<label class="mdl-textfield__label"></label>	
								</div>
							</div>
							<div style="float:right;">
									<a href="../php/reportes/transProducto.php" class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored bg-info" target="blank"><i style="margin-top:13px;" class="zmdi zmdi-print"></i>
									</a>
								</div>
						</form>
						<div class="contenedor1 full-width text-center" style="padding: 30px 0;">

						</div>
					</div>
				</div>
			</div>

			<div class="mdl-tabs__panel" id="tabNewProduct">
				<div class="mdl-grid">
					<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--8-col-desktop mdl-cell--2-offset-desktop">
						<div class="full-width panel mdl-shadow--2dp">
							<div class="full-width panel-tittle bg-success text-center tittles">
								Lista de Ingresos de Productos
							</div>
							<div class="full-width panel-content">
								<form action="#">
									<div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable">
										<label class="mdl-button mdl-js-button mdl-button--icon" for="searchAdmin">
											<i class="zmdi zmdi-search"></i>
										</label>
										<div class="mdl-textfield__expandable-holder">
											<input class="mdl-textfield__input" type="text" id="searchAdmin">
											<label class="mdl-textfield__label"></label>
										</div>
										<div style="float:right;">
											<a href="../php/reportes/transIngreso.php" class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored bg-info" target="blank"><i style="margin-top:13px;" class="zmdi zmdi-print"></i></a>
										</div>
									</div>
								</form>
								<div class="mdl-list">
									
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="mdl-tabs__panel" id="tabListProducts">
				<div class="mdl-grid">
					<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--12-col-desktop">
						<div class="full-width panel mdl-shadow--2dp">
							<div class="full-width panel-tittle bg-primary text-center tittles">
								Nuevo Ingreso
							</div>
							<div class="full-width panel-content">
								<form name="formIngreso" id="formIngreso">
									<div class="mdl-grid">
										<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--6-col-desktop">
											<h5 class="text-condensedLight">Seleccione el Producto</h5>
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<select class="mdl-textfield__input" name="producto" id="producto">
												</select>
											</div>
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<input class="mdl-textfield__input" type="number" id="cantidad" name="cantidad">
												<label class="mdl-textfield__label" for="cantidad">Cantidad</label>
												<span class="mdl-textfield__error">Error Verifique la Cantidad</span>
											</div>
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<input class="mdl-textfield__input" type="text" pattern="-?[0-9.]*(\.[0-9]+)?" id="precio" name="precio">
												<label class="mdl-textfield__label" for="PriceProduct">Precio de Compra por Unidad</label>
												<span class="mdl-textfield__error">Precio Invalido</span>
											</div>
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<input class="mdl-textfield__input" type="number" id="factura" name="factura">
												<label class="mdl-textfield__label" for="factura">Numero de Factura de Compra</label>
												<span class="mdl-textfield__error">Error Verifique la Factura</span>
											</div>
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<input class="mdl-textfield__input" type="text" pattern="-?[0-9.]*(\.[0-9]+)?" id="monto" name="monto" value="0">
												<label class="mdl-textfield__label" for="PriceProduct">Monto de la Factura</label>
												<span class="mdl-textfield__error">Monto Invalido</span>
											</div>
											<h5 class="text-condensedLight">Proveedor</h5>
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<select class="mdl-textfield__input" name="proveedor" id="proveedor">
												</select>
											</div>
											
										</div>
										<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--6-col-desktop">
											<h5 class="text-condensedLight">Fecha de Ingreso</h5>
											<div class="mdl-textfield mdl-js-textfield">
												<input type="date" name="fechai" id="fechai" class="mdl-textfield__input">
											</div>
											<h5 class="text-condensedLight">Fecha Vencimiento de Garantía</h5>
											<div class="mdl-textfield mdl-js-textfield">
												<input type="date" name="fechav" id="fechav" class="mdl-textfield__input">
											</div>
											<h5 class="text-condensedLight">Personal</h5>
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<select class="mdl-textfield__input" name="personal" id="personal">
												</select>
											</div>
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<input class="mdl-textfield__input" type="text" id="notas" name="notas">
												<label class="mdl-textfield__label" for="notas">Notas</label>
												<span class="mdl-textfield__error">Notas Invalidas</span>
											</div>
										</div>
									</div>
									<p class="text-center">
										<button class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored bg-primary" id="agregar">
											<i class="zmdi zmdi-plus"></i>
										</button>
										<div id="nuevo1">
											<a href="ingreso.php" class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--colored bg-primary" id="nuevo"><span style="color:#fff">Nuevo Registro</span>
											</a>	
										</div>
										<div class="mdl-tooltip" for="agregar">Agregar Producto</div>
									</p>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</body>
</html>
<?PHP
  } 
  else {
      header("location:../index.html");
  }
?>