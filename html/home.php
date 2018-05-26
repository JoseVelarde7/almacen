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
	<title>Inicio</title>
	<link rel="stylesheet" href="../css/normalize.css">
	<link rel="stylesheet" href="../css/sweetalert2.css">
	<link rel="stylesheet" href="../css/material.min.css">
	<link rel="stylesheet" href="../css/material-design-iconic-font.min.css">
	<link rel="stylesheet" href="../css/jquery.mCustomScrollbar.css">
	<link rel="stylesheet" href="../css/main.css">
	<script src="../js/jquery-1.11.2.min.js"></script>
	<script src="../js/material.min.js" ></script>
	<script src="../js/sweetalert2.min.js" ></script>
	<script src="../js/jquery.mCustomScrollbar.concat.min.js" ></script>
	<script src="../js/main.js" ></script>
	<script src="../js/home.js" ></script>
	<script src="../js/Chart.bundle.min.js"></script>
	<script src="../js/Chart.min.js"></script>
</head>
<body>
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
						<!--<i class="zmdi zmdi-notifications-active btn-Notification" id="notifications">5</i> -->
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
		<section class="full-width text-center" style="padding: 40px 0;">
			<h3 class="text-center tittles">SISTEMA DE INVENTARIOS</h3>
			<!-- Tiles -->
			<article class="full-width tile">
				<div class="tile-text">
					<span class="text-condensedLight" style="color:black;">
						<div id="usuarios"></div><br>
						<small>Administradores</small>
					</span>
				</div>
				<i class="zmdi zmdi-account tile-icon" style="color:#ae113d;"></i>
			</article>
			<article class="full-width tile">
				<div class="tile-text">
					<span class="text-condensedLight" style="color:black;">
						<div id="clientes"></div><br>
						<small>Clientes</small>
					</span>
				</div>
				<i class="zmdi zmdi-accounts tile-icon" style="color:#199900;"></i>
			</article>
			<article class="full-width tile">
				<div class="tile-text">
					<span class="text-condensedLight" style="color:black;">
						<div id="proveedores"></div><br>
						<small>Proveedores</small>
					</span>
				</div>
				<i class="zmdi zmdi-truck tile-icon" style="color:#1b58b8;"></i>
			</article>
			<article class="full-width tile">
				<div class="tile-text">
					<span class="text-condensedLight" style="color:black;">
						9<br>
						<small>Categorias</small>
					</span>
				</div>
				<i class="zmdi zmdi-label tile-icon" style="color: #2673ec;"></i>
			</article>
			<article class="full-width tile">
				<div class="tile-text">
					<span class="text-condensedLight" style="color:black;">
						<div id="productos"></div><br>
						<small>Productos</small>
					</span>
				</div>
				<i class="zmdi zmdi-washing-machine tile-icon" style="color:#00a4a4;"></i>
			</article>
			<article class="full-width tile">
				<div class="tile-text">
					<span class="text-condensedLight" style="color:black;">
						<div id="ventas"></div><br>
						<small>Ventas</small>
					</span>
				</div>
				<i class="zmdi zmdi-shopping-cart tile-icon" style="color:#1f0068;"></i>
			</article>
		</section>


		<section class="full-width" style="margin: 30px 0;">
			<h3 class="text-center tittles">Ventas de Productos</h3>
			<canvas id="myChart" width="100" height="50"></canvas>
		</section>

		<section class="full-width" style="margin: 30px 0;">
			<h3 class="text-center tittles">Stock de Productos</h3>
			<canvas id="myChart2" width="100" height="50"></canvas>
		</section>

	</section>

	<script>

		var arreglo=new Array();
		var unidades=new Array();
		$.getJSON("../php/operacion.php", {evento: "showGventas"}, function(respuesta){
			for (var i = 0; i < respuesta.length; i++) {
					arreglo.push(respuesta[i]['producto_productos']);
					unidades.push(respuesta[i]['sum(descargos.cantidad_descargo)']);
			}	

			var ctx = document.getElementById("myChart");
	    var myChart = new Chart(ctx, {
	        type: 'bar',
	        data: {
	            labels: arreglo,
	            datasets: [{
	                label: 'Unidades Vendidas',
	                data: unidades,
	                backgroundColor: [
	                    /*'rgba(255, 99, 132, 0.2)',*/
	                    '#2673ec',
	                    '#ae113d',
	                    '#199900',
	                    '#ff2e12',
	                    '#1b58b8',
	                    '#00a4a4',
	                    '#1f0068'
	                ],
	                borderColor: [
	                    'rgba(255,255,255,255)',
	                    'rgba(255,255,255,255)',
	                    'rgba(255,255,255,255)',
	                    'rgba(255,255,255,255)',
	                    'rgba(255,255,255,255)',
	                    'rgba(255,255,255,255)',
	                    'rgba(255,255,255,255)'
	                ],
	                borderWidth: 1
	            }]
	        },
	        options: {
	            scales: {
	                yAxes: [{
	                    ticks: {
	                        beginAtZero:true
	                    }
	                }]
	            }
	        }
	    });
    });

    var arreglo2=new Array();
		var unidades2=new Array();
		var col=new Array();
		$.getJSON("../php/operacion.php", {evento: "showGstock"}, function(respuesta){
			for (var i = 0; i < respuesta.length; i++) {
					arreglo2.push(respuesta[i]['producto_productos']);
					unidades2.push(respuesta[i]['cantidad']);
			}	

			col=colores(respuesta.length);
			var ctx = document.getElementById("myChart2");
	    var myChart2 = new Chart(ctx, {
	        type: 'bar',
	        data: {
	            labels: arreglo2,
	            datasets: [{
	                label: 'Stock Productos',
	                data: unidades2,
	                backgroundColor: col,
	                borderColor: col,
	                borderWidth: 1
	            }]
	        },
	        options: {
	            scales: {
	                yAxes: [{
	                    ticks: {
	                        beginAtZero:true
	                    }
	                }]
	            }
	        }
	    });
    });

    function colores(tamanio){
    	var colorazar;
    	var colorhexa;
    	var tam;
    	var colorhexa2;

    	var arreglo3=new Array();
    	for (var i = 0; i < tamanio; i++) {
    		colorazar=Math.floor(Math.random()*16777216);
    		colorhexa=colorazar.toString(16);
				tam=colorhexa.length;
				colorhexa2 = (tam<6)? ( "000000".substring(0,6-tam) + colorhexa ) : colorhexa;
				arreglo3.push("#"+colorhexa);
    	}
    	return (arreglo3);
    }

    colores();

	</script>
</body>
</html>

<?PHP
  } 
  else {
      header("location:../index.html");
  }
?>