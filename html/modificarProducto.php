<?php
	session_start(); 
	$ide=$_GET['id'];
  require '../php/conectar.php';
  $res=R::getAll('select id,cod_producto,cod_unidad,precio_productos,producto_productos,cod_categoria,descripcion_producto,marca_producto,foto_producto FROM productos WHERE id='.$ide.'');
  $tipos=R::getAll('select cod_categoria,nombre_categoria FROM categoria');
  $unidad=R::getAll('select cod_unidad,unidad_unidades FROM unidades');
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
				$("#codigo,#nombre,#tipo,#marca,#descripcion,#unidad,#precio").removeAttr("readonly");
				$('#editar').hide();
				$('#eliminar').hide();
				$('#modificar').show();
			});
			$('#modificar').on('click',function(e){
				e.preventDefault();
				var dat=$('#formregistrar').serialize();
				$.ajax({
	          url:'../php/registros.php',
	          type:'post',
	          data: "valor=modificarProducto"+"&"+dat,
	          beforeSend:function(){
	              $('.faocu').css('display','inline')
	          },
	          success: function(resp){
	              swal(
	                'Registro Modificado',
	                'Se Modifico el Registro Nro. '+resp,
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
		  		title: 'Desea Eliminar Producto?',
  		 		text: "No se podra recuperar los Datos",
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
	                  data: "valor=anularProducto&ide="+ide+"",
	                  beforeSend:function(){
	                      $('.faocu').css('display','inline')
	                  },
	                  success: function(resp){
	                  		console.log(resp);
	                  		if (resp) {
	                  			resp="correctamente";
	                  		}
	                      swal(
	                        'Producto Eliminado',
	                        'Se anulo el Producto '+resp,
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
						MODIFICAR PRODUCTO
					</div>
					<div class="full-width panel-content">
						<form name="formregistrar" id="formregistrar">
							<input type="text" name="ide" id="ide" value="<?php echo $res[0]['id']; ?>" style="display:none;">
							<div class="mdl-grid">
								<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--6-col-desktop">
									<h5 class="text-condensedLight">Informacion Básica</h5>
									<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
										<input class="mdl-textfield__input" type="number" value="<?php echo $res[0]['cod_producto']; ?>" readonly id="codigo" name="codigo">
										<label class="mdl-textfield__label" for="BarCode">Codigo de Barras</label>
										<span class="mdl-textfield__error">Codigo Invalido</span>
									</div>
									<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
										<input class="mdl-textfield__input" type="text" id="nombre" name="nombre" value="<?php echo $res[0]['producto_productos']; ?>" readonly>
										<label class="mdl-textfield__label" for="nombre">Nombre del Producto</label>
										<span class="mdl-textfield__error">Nombre Invalido</span>
									</div>
									<div class="mdl-textfield mdl-js-textfield">
										<select class="mdl-textfield__input" name="tipo" id="tipo">
											<?php 
													$d=[];
													foreach ($tipos as $key => $value) {
														foreach ($value as $key1 => $value1) {
															$d[]=$value1;
														}
														if ($d[0]==$res[0]['cod_categoria']) {
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
										<input class="mdl-textfield__input" type="text" id="marca" name="marca" value="<?php echo $res[0]['marca_producto']; ?>" readonly>
										<label class="mdl-textfield__label" for="marca">Marca del Producto</label>
										<span class="mdl-textfield__error">Marca Invalido</span>
									</div>	
								</div>
								<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--6-col-desktop">
									<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
										<input class="mdl-textfield__input" type="text" value="<?php echo $res[0]['descripcion_producto']; ?>" readonly id="descripcion" name="descripcion">
										<label class="mdl-textfield__label" for="descripcion">Descripcion</label>
										<span class="mdl-textfield__error">Descripcion Invalido</span>
									</div>
									<h5 class="text-condensedLight">Unidades y Precio</h5>
									<div class="mdl-textfield mdl-js-textfield">
										<select class="mdl-textfield__input" id="unidad" name="unidad">
											<?php 
													$d=[];
													foreach ($unidad as $key => $value) {
														foreach ($value as $key1 => $value1) {
															$d[]=$value1;
														}
														if ($d[0]==$res[0]['cod_unidad']) {
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
										<input class="mdl-textfield__input" type="text" id="precio" name="precio" value="<?php echo $res[0]['precio_productos']; ?>" readonly>
										<label class="mdl-textfield__label" for="precio">Precio</label>
										<span class="mdl-textfield__error">Precio Invalido</span>
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
								<a href="productos.php" class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored bg-warning" id="volver">
									<i class="zmdi zmdi-arrow-left" style="margin-top:13px;"></i>
								</a>
								<?php 
									}
									if(isset($_SESSION['USUARIO2'])){
								 ?>
								 <a href="productos2.php" class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored bg-warning" id="volver">
									<i class="zmdi zmdi-arrow-left" style="margin-top:13px;"></i>
								</a>
								<?php }?>
								<a href="../php/reportes/transProducto1.php?io=<?php echo $ide ?>" class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored bg-info" target="blank" id="imprimir"><i style="margin-top:13px;" class="zmdi zmdi-print"></i>
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
							
							