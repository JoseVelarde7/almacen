<?Php
session_start();
    if(isset($_SESSION['USUARIO2'])){
    $nombre=$_SESSION['USUARIO2'];
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
	<link rel="stylesheet" href="../css/remodal.css">
    <link rel="stylesheet" href="../css/remodal-default-theme.css">
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<script>window.jQuery || document.write('<script src="../js/jquery-1.11.2.min.js"><\/script>')</script>
	<script src="../js/material.min.js" ></script>
	<script src="../js/sweetalert2.min.js" ></script>
	<script src="../js/jquery.mCustomScrollbar.concat.min.js" ></script>
	<script src="../js/main.js" ></script>
	<script src="../js/productos.js"></script>
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
				<i class="zmdi zmdi-close btn-menu"></i> Almacenes
			</div>
			<figure class="full-width" style="height: 77px;">
				<div class="navLateral-body-cl">
					<img src="../assets/img/avatar-male.png" alt="Avatar" class="img-responsive">
				</div>
				<figcaption class="navLateral-body-cr hide-on-tablet">
					<span>
						<?php echo $nombre; ?><br>
						<small>Almacenes</small>
					</span>
				</figcaption>
			</figure>
			<div class="full-width tittles navLateral-body-tittle-menu">
				<i class="zmdi zmdi-desktop-mac"></i><span class="hide-on-tablet">&nbsp; MENU PRINCIPAL</span>
			</div>
			<nav class="full-width">
				<ul class="full-width list-unstyle menu-principal">
					<li class="full-width">
						<a href="almacenHome.php" class="full-width">
							<div class="navLateral-body-cl">
								<i class="zmdi zmdi-view-dashboard"></i>
							</div>
							<div class="navLateral-body-cr hide-on-tablet">
								INICIO
							</div>
						</a>
					</li>
					<li class="full-width divider-menu-h"></li>
					<li class="full-width">
						<a href="providers2.php" class="full-width">
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
						<a href="productos2.php" class="full-width">
							<div class="navLateral-body-cl">
								<i class="zmdi zmdi-washing-machine"></i>
							</div>
							<div class="navLateral-body-cr hide-on-tablet">
								PRODUCTOS
							</div>
						</a>
					</li>
					<li class="full-width divider-menu-h"></li>
					<li class="full-width">
						<a href="ingreso2.php" class="full-width">
							<div class="navLateral-body-cl">
								<i class="zmdi zmdi-washing-machine"></i>
							</div>
							<div class="navLateral-body-cr hide-on-tablet">
								INGRESO DE PRODUCTOS
							</div>
						</a>
					</li>
					<li class="full-width">
						<a href="inventory2.php" class="full-width">
							<div class="navLateral-body-cl">
								<i class="zmdi zmdi-store"></i>
							</div>
							<div class="navLateral-body-cr hide-on-tablet">
								INVENTARIO
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
				<a href="#tabNewProduct" class="mdl-tabs__tab is-active">LISTA DE PRODUCTOS</a>
				<a href="#tabListProducts" class="mdl-tabs__tab">REGISTRAR PRODUCTO</a>
			</div>
			<div class="mdl-tabs__panel is-active" id="tabNewProduct">
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
			<div class="mdl-tabs__panel" id="tabListProducts">
				<div class="mdl-grid">
					<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--12-col-desktop">
						<div class="full-width panel mdl-shadow--2dp">
							<div class="full-width panel-tittle bg-primary text-center tittles">
								NUEVO PRODUCTO
							</div>
							<div class="full-width panel-content">
								<form name="formregistrar" id="formregistrar">
									<div class="mdl-grid">
										<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--6-col-desktop">
											<h5 class="text-condensedLight">Informacion Básica</h5>
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<input class="mdl-textfield__input" type="number" pattern="-?[0-9- ]*(\.[0-9]+)?" id="codigo" name="codigo">
												<label class="mdl-textfield__label" for="BarCode">Codigo de Barras</label>
												<span class="mdl-textfield__error">Codigo Invalido</span>
											</div>
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<input class="mdl-textfield__input" type="text" pattern="-?[A-Za-z0-9áéíóúÁÉÍÓÚ ]*(\.[0-9]+)?" id="nombre" name="nombre">
												<label class="mdl-textfield__label" for="nombre">Nombre del Producto</label>
												<span class="mdl-textfield__error">Nombre Invalido</span>
											</div>
											<div class="mdl-textfield mdl-js-textfield">
												<select class="mdl-textfield__input" name="tipo" id="tipo">
												</select>
												<small><a href="#modal" id="modal" name="modal" style="color:#000; text-decoration:none;">Agregar Nuevo</a></small>	
											</div>
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<input class="mdl-textfield__input" type="text" pattern="-?[A-Za-z0-9áéíóúÁÉÍÓÚ ]*(\.[0-9]+)?" id="marca" name="marca">
												<label class="mdl-textfield__label" for="marca">Marca del Producto</label>
												<span class="mdl-textfield__error">Marca Invalido</span>
											</div>	
										</div>
										<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--6-col-desktop">
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<input class="mdl-textfield__input" type="text" pattern="-?[A-Za-z0-9áéíóúÁÉÍÓÚ ]*(\.[0-9]+)?" id="descripcion" name="descripcion">
												<label class="mdl-textfield__label" for="descripcion">Descripcion</label>
												<span class="mdl-textfield__error">Descripcion Invalido</span>
											</div>
											<h5 class="text-condensedLight">Unidades y Precio</h5>
											<div class="mdl-textfield mdl-js-textfield">
												<select class="mdl-textfield__input" id="unidad" name="unidad">
												</select>
												<small><a href="#modal2" id="modal2" name="modal2" style="color:#000; text-decoration:none;">Agregar Nuevo</a></small>
											</div>
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<input class="mdl-textfield__input" type="text" pattern="-?[0-9.]*(\.[0-9]+)?" id="precio" name="precio">
												<label class="mdl-textfield__label" for="precio">Precio</label>
												<span class="mdl-textfield__error">Precio Invalido</span>
											</div>
										</div>
									</div>
									<p class="text-center">
										<button class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored bg-primary" id="registrar">
											<i class="zmdi zmdi-plus"></i>
										</button>
										<div id="nuevo1">
											<a href="productos.php" class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--colored bg-primary" id="nuevo"><span style="color:#fff">Nuevo Registro</span>
											</a>	
										</div>
										<div class="mdl-tooltip" for="registrar">Registrar Producto</div>
									</p>
								</form>
							</div>
							<div class="mdl-grid">
									<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--6-col-desktop">
											<h5 class="text-condensedLight">Subir Imagen (Opcional)</h5>
											<form action='subir.php' method='post' enctype='multipart/form-data'>
												 <input type='file' name='file' />
												 <input type='submit' name='submit' value='Subir Imagen' />
											</form>
									</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
		<div class="remodal" data-remodal-id="modal" role="dialog" aria-labelledby="modal1Title" aria-describedby="modal1Desc">
		  <button data-remodal-action="close" class="remodal-close" aria-label="Close"></button>
		  <div>
		    <h2 id="modal1Title">Registrar Nueva Categoria</h2>
				<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--12-col-desktop">
					<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
						<input class="mdl-textfield__input" type="text" id="codCat" name="codCat">
						<label class="mdl-textfield__label" for="BarCode">Codigo de Categoria</label>
						<span class="mdl-textfield__error">Codigo Invalido</span>
					</div>
					<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
						<input class="mdl-textfield__input" type="text" id="nombreCat" name="nombreCat">
						<label class="mdl-textfield__label" for="nombre">Nombre de Categoria</label>
						<span class="mdl-textfield__error">Nombre Invalido</span>
					</div>	
				</div>
					<h4 id="message"></h4>
		  </div>
		  <br>
		  <button data-remodal-action="cancel" class="remodal-cancel">Volver</button>
		  <a href="#" id="regCategoria" class="remodal-confirm">Registrar</a>
		</div>
		<div class="remodal" data-remodal-id="modal2" role="dialog" aria-labelledby="modal1Title" aria-describedby="modal1Desc">
		  <button data-remodal-action="close" class="remodal-close" aria-label="Close"></button>
		  <div>
		    <h2 id="modal1Title">Registrar Nueva Unidad</h2>
				<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--12-col-desktop">
					<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
						<input class="mdl-textfield__input" type="text" id="codUn" name="codUn">
						<label class="mdl-textfield__label" for="BarCode">Codigo de Unidad</label>
						<span class="mdl-textfield__error">Codigo Invalido</span>
					</div>
					<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
						<input class="mdl-textfield__input" type="text" id="nombreUn" name="nombreUn">
						<label class="mdl-textfield__label" for="nombre">Nombre de Unidad</label>
						<span class="mdl-textfield__error">Nombre Invalido</span>
					</div>	
				</div>
					<h4 id="message2"></h4>
		  </div>
		  <br>
		  <button data-remodal-action="cancel" class="remodal-cancel">Volver</button>
		  <a href="#" id="regUnidad" class="remodal-confirm">Registrar</a>
		</div>
</body>
</html>
<?PHP
  } 
  else {
      header("location:../index.html");
  }
?>