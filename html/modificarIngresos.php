<?php 
	session_start();
	$ide=$_GET['id'];
  require '../php/conectar.php';
  $res=R::getAll('select id,cantidad_ad,factura_ad,fechai_ad,fechav_ad,cod_producto,cod_proveedor,monto_ad,precio_ad,cod_personal,notas_ad FROM adquisicion WHERE id='.$ide.'');
  $productos=R::getAll('select cod_producto,producto_productos FROM productos');
  $proveedores=R::getAll('select cod_proveedor,razon_proveedor FROM proveedores');
  $usuarios=R::getAll('select cod_personal,nombre_usuario,apellido_usuario FROM usuarios');
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Administracion</title>
	<link rel="stylesheet" href="../css/normalize.css">
	<link rel="stylesheet" href="../css/sweetalert2.css">
	<link rel="stylesheet" href="../css/material.min.css">
	<link rel="stylesheet" href="../css/material-design-iconic-font.min.css">
	<link rel="stylesheet" href="../css/jquery.mCustomScrollbar.css">
	<link rel="stylesheet" href="../css/main.css">
	<link rel="stylesheet" href="../css/remodal.css">
  <link rel="stylesheet" href="../css/remodal-default-theme.css">
	<script src="../js/jquery-1.11.2.min.js"></script>
	<script src="../js/material.min.js" ></script>
	<script src="../js/sweetalert2.min.js" ></script>
	<script src="../js/jquery.mCustomScrollbar.concat.min.js"></script>
	<script src="../js/main.js"></script>
	<script src="../js/remodal.js"></script>
	<script>
		$(document).on('ready',function(){

			$('#modificar').hide();
			$('#editar').click(function(e){
				e.preventDefault();
				$("#cantidad,#factura,#monto,#marca,#precio,#fechai,#fechav,#notas").removeAttr("readonly");
				$('#editar').hide();
				$('#eliminar').hide();
				$('#modificar').show();
			});
			$('#modificar').on('click',function(e){
				e.preventDefault();
				var dat=$('#formIngreso').serialize();
				console.log(dat);
				$.ajax({
	          url:'../php/registros.php',
	          type:'post',
	          data: "valor=modificarIngreso"+"&"+dat,
	          beforeSend:function(){
	              $('.faocu').css('display','inline')
	          },
	          success: function(resp){
	              swal(
	                'Registro Modificado',
	                'Se Modifico el Ingreso Nro. '+resp,
	                'success'
	              )
	          },
	          error:function(jqXHR,estado,error){
	              swal(
	                'Ocurrio un Error',
	                'tipo de error '+resp,
	                'error'
	              )
	              console.log(error)
	          },
	          complete:function(jqXHR,estado){
	              $('#modificar').hide();
	              $('#nuevo1').show();
	          }
	      });
			});
			$('#eliminar').on('click',function(e){
				e.preventDefault();
				var ide=$('#ide').val();
				swal({
		  		title: 'Desea Eliminar el Ingreso?',
  		 		text: "esta opcion Afectará el stock en Almacen",
  		  	type: 'error',
  		  	showCancelButton: true,
  		  	confirmButtonText: 'Si, Eliminar',
  		  	closeOnConfirm: true
  		  },
    		function(isConfirm) {
    		  	if (isConfirm) {
                $.ajax({
	                  url:'../php/registros.php',
	                  type:'post',
	                  data: "valor=anularIngreso&ide="+ide+"",
	                  beforeSend:function(){
	                      $('.faocu').css('display','inline')
	                  },
	                  success: function(resp){
	                  		if (resp) {
	                  			resp="correctamente";
	                  		}
	                      swal(
	                        'Ingreso Eliminado',
	                        'Se Stock de Almacen Eliminado '+resp,
	                        'success'
	                      )
	                  },
	                  error:function(jqXHR,estado,error){
	                      swal(
	                        'Ocurrio un Error',
	                        'tipo de error '+resp,
	                        'error'
	                      )
	                      console.log(error)
	                  },
	                  complete:function(jqXHR,estado){
	                      $('#registrar').hide();
	                      $('#nuevo1').show();
	                      $('#editar').hide();
												$('#eliminar').hide();
	                  }
	              });
    		  	}
    		});
			});
		});
	</script>
</head>
<body>
	<div class="mdl-tabs__panel" id="tabListAdmin">
		<div class="mdl-grid">
			<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--12-col-desktop">
				<div class="full-width panel mdl-shadow--2dp">
					<div class="full-width panel-tittle bg-primary text-center tittles">
						MODIFICAR INGRESO AL ALMACEN
					</div>
					<div class="full-width panel-content">
						<form name="formIngreso" id="formIngreso">
							<input type="text" name="ide" id="ide" value="<?php echo $res[0]['id']; ?>" style="display:none;">
							<div class="mdl-grid">
								<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--6-col-desktop">
									<h5 class="text-condensedLight">Seleccione el Producto</h5>
									<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
										<select class="mdl-textfield__input" name="producto" id="producto">
											<?php 
													$d=[];
													foreach ($productos as $key => $value) {
														foreach ($value as $key1 => $value1) {
															$d[]=$value1;
														}
														if ($d[0]==$res[0]['cod_producto']) {
														?>
															<option value='<?php echo $d[0]; ?>' selected><?php echo $d[1]; ?></option>
														<?php
														}else{
											 ?>
														<option value='<?php echo $d[0]; ?>'><?php echo $d[1]; ?></option>
											<?php
														}
														unset($d); 
													}
											?>
										</select>
									</div>
									<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
										<input class="mdl-textfield__input" type="number" id="cantidad" name="cantidad" value="<?php echo $res[0]['cantidad_ad'];?>" readonly>
										<label class="mdl-textfield__label" for="cantidad">Cantidad</label>
										<span class="mdl-textfield__error">Error Verifique la Cantidad</span>
									</div>
									<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
										<input class="mdl-textfield__input" type="number" id="factura" name="factura" value="<?php echo $res[0]['factura_ad']; ?>" readonly>
										<label class="mdl-textfield__label" for="factura">Numero de Factura de Compra</label>
										<span class="mdl-textfield__error">Error Verifique la Factura</span>
									</div>
									<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
										<input class="mdl-textfield__input" type="text" pattern="-?[0-9.]*(\.[0-9]+)?" id="monto" name="monto" value="<?php echo $res[0]['monto_ad']; ?>" readonly>
										<label class="mdl-textfield__label" for="PriceProduct">Monto de la Factura</label>
										<span class="mdl-textfield__error">Monto Invalido</span>
									</div>
									<h5 class="text-condensedLight">Proveedor</h5>
									<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
										<select class="mdl-textfield__input" name="proveedor" id="proveedor">
											<?php 
													$d=[];
													foreach ($proveedores as $key => $value) {
														foreach ($value as $key1 => $value1) {
															$d[]=$value1;
														}
														if ($d[0]==$res[0]['cod_proveedor']) {
														?>
															<option value='<?php echo $d[0]; ?>' selected><?php echo $d[1]; ?></option>
														<?php
														}else{
											 ?>
														<option value='<?php echo $d[0]; ?>'><?php echo $d[1]; ?></option>
											<?php
														}
														unset($d); 
													}
											?>
										</select>
									</div>
									<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
										<input class="mdl-textfield__input" type="text" pattern="-?[0-9.]*(\.[0-9]+)?" id="precio" name="precio" value="<?php echo $res[0]['precio_ad']; ?>" readonly>
										<label class="mdl-textfield__label" for="PriceProduct">Precio del Producto por Unidad</label>
										<span class="mdl-textfield__error">Precio Invalido</span>
									</div>
								</div>
								<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--6-col-desktop">
									<h5 class="text-condensedLight">Fechas de Ingreso</h5>
									<div class="mdl-textfield mdl-js-textfield">
										<input type="date" name="fechai" id="fechai" class="mdl-textfield__input" value="<?php echo $res[0]['fechai_ad']; ?>" readonly>
									</div>
									<h5 class="text-condensedLight">Fechas de Vencimiento</h5>
									<div class="mdl-textfield mdl-js-textfield">
										<input type="date" name="fechav" id="fechav" class="mdl-textfield__input" value="<?php echo $res[0]['fechav_ad']; ?>" readonly>
									</div>
									<h5 class="text-condensedLight">Personal</h5>
									<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
										<select class="mdl-textfield__input" name="personal" id="personal">
											<?php 
													$d=[];
													foreach ($usuarios as $key => $value) {
														foreach ($value as $key1 => $value1) {
															$d[]=$value1;
														}
														if ($d[0]==$res[0]['cod_personal']) {
														?>
															<option value='<?php echo $d[0]; ?>' selected><?php echo $d[1]; ?></option>
														<?php
														}else{
											 ?>
														<option value='<?php echo $d[0]; ?>'><?php echo $d[1]; ?></option>
											<?php
														}
														unset($d); 
													}
											?>
										</select>
									</div>
									<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
										<input class="mdl-textfield__input" type="text" id="notas" name="notas" value="<?php echo $res[0]['notas_ad']; ?>" readonly>
										<label class="mdl-textfield__label" for="notas">Notas</label>
										<span class="mdl-textfield__error">Notas Invalidas</span>
									</div>
								</div>
							</div>
							<p class="text-center">
								<a href="#" class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored bg-primary" id="editar">
									<i class="zmdi zmdi-plus" style="margin-top:13px;"></i>
								</a>
								<a href="#" class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored bg-success" id="modificar">
									<i class="zmdi zmdi-border-color" style="margin-top:13px;"></i>
								</a>
								<a href="#" class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored bg-danger" id="eliminar"> 
									<i class="zmdi zmdi-delete" style="margin-top:13px;"></i>
								</a>
								<?php 
									if(isset($_SESSION['ADMIN'])){
								 ?>
								<a href="ingreso.php" class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored bg-warning" id="volver">
									<i class="zmdi zmdi-arrow-left" style="margin-top:13px;"></i>
								</a>
								<?php 
									}
									if(isset($_SESSION['USUARIO2'])){
								 ?>
								 <a href="ingreso2.php" class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored bg-warning" id="volver">
									<i class="zmdi zmdi-arrow-left" style="margin-top:13px;"></i>
								</a>
								<?php }?>
								<a href="../php/reportes/transIngreso1.php?io=<?php echo $ide ?>" class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored bg-info" target="blank" id="imprimir"><i style="margin-top:13px;" class="zmdi zmdi-print"></i>
								</a>
								<div class="mdl-tooltip" for="editar">Editar</div>
								<div class="mdl-tooltip" for="volver">Regresar</div>
								<div class="mdl-tooltip" for="modificar">Modificar</div>
								<div class="mdl-tooltip" for="eliminar">Eliminar</div>
								<div class="mdl-tooltip" for="imprimir">Imprimir</div>
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
</body>
</html> 
							
							