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
	<title>Ventas</title>
	<link rel="stylesheet" href="../css/normalize.css">
	<link rel="stylesheet" href="../css/sweetalert25.css">
	<link rel="stylesheet" href="../css/material.min.css">
	<link rel="stylesheet" href="../css/material-design-iconic-font.min.css">
	<link rel="stylesheet" href="../css/jquery.mCustomScrollbar.css">
	<link rel="stylesheet" href="../css/main.css">
	<link rel="stylesheet" href="../css/easy-autocomplete.css">
	<link rel="stylesheet" href="../css/remodal.css">
  <link rel="stylesheet" href="../css/remodal-default-theme.css">
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<script>window.jQuery || document.write('<script src="../js/jquery-1.11.2.min.js"><\/script>')</script>
	<script src="../js/material.min.js" ></script>
	<script src="../js/sweetalert25.min.js" ></script>
	<script src="../js/jquery.mCustomScrollbar.concat.min.js" ></script>
	<script src="../js/main.js"></script>
	<script src="../js/jquery.easy-autocomplete.js" ></script>
	<script src="../js/ventas.js" ></script>
	<script src="../js/remodal.js"></script>
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
				<a href="#tabNewAdmin" class="mdl-tabs__tab is-active">Registrar Ventas</a>
				<a href="#tabListAdmin" class="mdl-tabs__tab">Lista de Ventas</a>
				<a href="#tabListAdmin2" class="mdl-tabs__tab">Reporte de Ventas</a>
				<a href="#tabFactura" class="mdl-tabs__tab">Facturación</a>
			</div>
			<div class="mdl-tabs__panel is-active" id="tabNewAdmin">			
				<div class="mdl-grid">
					<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--12-col-desktop">
						<div class="full-width panel mdl-shadow--2dp">
							<div class="full-width panel-tittle bg-primary text-center tittles">
								REGISTRAR NUEVA VENTA
							</div>
							<div class="full-width panel-content">
								<form name="registrarVenta" id="registrarVenta">
									<div class="mdl-grid">
										<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--6-col-desktop">
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<input class="mdl-textfield__input" type="text" name="cliente" id="cliente">
												<label class="mdl-textfield__label" for="cliente">Cliente</label>
												<input type="text" name="codcli" id="codcli" style="display:none;">
											</div>
										</div>
										<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--6-col-desktop">
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<input class="mdl-textfield__input" type="text" name="personal" id="personal">
												<input type="text" name="codper" id="codper" style="display:none;">
												<label class="mdl-textfield__label" for="personal">Nombre de Usuario</label>
											</div>
										</div>
									</div>
									<!--<div class="mdl-grid">
										<div class="mdl-cell--3-col-desktop">
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<input class="mdl-textfield__input" type="text" name="nitcli" id="nitcli">
												<label class="mdl-textfield__label" for="nitcli">Nit</label>
												<input type="text" name="nitcli1" id="nitcli1" style="display:none;">
											</div>
										</div>
									</div>-->
									<div class="mdl-grid">
										<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--8-col-desktop mdl-cell--2-offset-desktop">
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<input class="mdl-textfield__input" type="text" name="producto" id="producto">
												<label class="mdl-textfield__label" for="cliente">Productos</label>
												<input type="text" name="codpro" id="codpro" style="display:none;">
											</div>
										</div>
										<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--2-col-desktop">
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<a href="#" class="mdl-js-button" id="agregar">Agregar</a>
											</div>
										</div>
										<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--8-col-desktop mdl-cell--2-offset-desktop">
											<table id="tabVenta" class="mdl-data-table mdl-js-data-table mdl-shadow--2dp full-width table-responsive">
												<thead>
													<tr>
														<th>Producto</th>
														<th>Cantidad</th>
														<th>Precio Bs.</th>
														<th>Total</th>
													</tr>
												</thead>
												<tbody class="contenedor">
												</tbody>
											</table>
											<div style="float:right;">
												<label for="total">Total</label><input type="text" name="total" id="total" readonly>
											</div>
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<textarea class="mdl-textfield__input" name="notas" id="notas" cols="30" rows="2"></textarea>
												<label class="mdl-textfield__label" for="notas">Observaciones</label>
											</div>
										</div>
									</div>
									<p class="text-center">
										<button class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored bg-primary" id="registrar">
											<i class="zmdi zmdi-plus"></i>
										</button>

										<a href="#" class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored bg-primary" id="nfactura">
											<i class="zmdi zmdi-plus"></i>
										</a>

										<div id="nuevo1">
											<a href="sales.php" class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--colored bg-primary" id="nuevo"><span style="color:#fff">Nuevo Registro</span>
											</a>	
										</div>
										<div class="mdl-tooltip" for="registrar">Agregar Cliente</div>
										<div align="center">
											<h3 id="mensaje"></h3>
										</div>
									</p>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="mdl-tabs__panel" id="tabListAdmin">
				<div class="mdl-grid">
					<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--12-col-desktop">
						<div style="float:right;">
							<a href="../php/reportes/transVentas.php" class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored bg-info" target="blank"><i style="margin-top:13px;" class="zmdi zmdi-print"></i></a>
						</div>
						<table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp full-width table-responsive">
							<thead>
								<tr>
									<th class="mdl-data-table__cell--non-numeric">FECHA</th>
									<th>CLIENTE</th>
									<th>TOTAL</th>
									<th>NOTAS</th>
									<th>VER PRODUCTOS</th>
								</tr>
							</thead>
							<tbody class="contenedor21">
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<div class="mdl-tabs__panel" id="tabListAdmin2">
				<div class="mdl-grid">
					<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--12-col-desktop">
						
							<div class="mdl-grid">
								<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--8-col-desktop mdl-cell--2-offset-desktop">

									<div class="full-width panel mdl-shadow--2dp">
										<div class="full-width panel-tittle bg-info text-center tittles">
											Ventas por Dias
										</div>
										<div class="full-width panel-content">
											<div align="center">
												<h5>Seleccione Dia:</h5>
												<input type="date" id="xdia" name="xdia">
												<a href="#" id="vxdia" class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored bg-info"><i style="margin-top:13px;" class="zmdi zmdi-print"></i>
												</a>
											</div>
										</div>
									</div>

									<div class="full-width panel mdl-shadow--2dp">
										<div class="full-width panel-tittle bg-success text-center tittles">
											Ventas por Periodos
										</div>
										<div class="full-width panel-content">
											<div align="center">
												<h5>Desde:</h5>
												<input type="date" id="ini" name="ini">
												<h5>Hasta:</h5>
												<input type="date" id="has" name="has"><br>
												<a href="#" id="vxperiodo" class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored bg-info"><i style="margin-top:13px;" class="zmdi zmdi-print"></i>
												</a>
											</div>
										</div>
									</div>
									
								</div>
							</div>

					</div>
				</div>
			</div>
			<div class="mdl-tabs__panel" id="tabFactura">
				<div class="mdl-grid">
					<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--12-col-desktop">
						<table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp full-width table-responsive">
							<thead>
								<tr>
									<th class="mdl-data-table__cell--non-numeric">NUMERO DE FACTURA</th>
									<th>FECHA</th>
									<th>NOMBRE</th>
									<th>NIT</th>
									<th>TOTAL</th>
									<th>VER FACTURA</th>
								</tr>
							</thead>
							<tbody class="contenedor25">
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</section>
		<div class="remodal" data-remodal-id="modal2" role="dialog" aria-labelledby="modal1Title" aria-describedby="modal1Desc">
		  <button data-remodal-action="close" class="remodal-close" aria-label="Close"></button>
		  <div>
		    <h2 id="modal1Title"></h2>
				<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--12-col-desktop">
						<table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp full-width table-responsive">
							<thead>
								<tr>
									<th>PRODUCTO</th>
									<th>CANTIDAD</th>
									<th>PRECIO</th>
									<th>TOTAL</th>
								</tr>
							</thead>
							<tbody class="contenedor31">
							</tbody>
						</table>	
				</div>
					<h4 id="message2"></h4>
					<h4 id="mCodigo" style="display:none;"></h4>
		  </div>
		  <br>
		  <button data-remodal-action="cancel" class="remodal-confirm">Volver</button>
		  <a href="#" id="anularVenta" class="remodal-cancel">Anular Venta</a>
		  <a href="#" class="remodal-confirm" id="imprimir">Imprimir</a>
		</div>  
</body>
</html>

<?PHP
  } 
  else {
      header("location:../index.html");
  }
?>
		