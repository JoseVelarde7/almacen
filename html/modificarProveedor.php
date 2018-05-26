<?php
  session_start();
  $ide=$_GET['id'];
  require '../php/conectar.php';
  $res=R::getAll('select id,cod_proveedor,razon_proveedor,representante_proveedor,nit_proveedor,direccion_proveedor,correo_proveedor,celular_proveedor,telefono_proveedor,notas_proveedor FROM proveedores WHERE id='.$ide.'');
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
				$("#carnet,#razon,#nit,#representante,#direccion,#correo,#celular,#telefono,#notas").removeAttr("readonly");
				$('#editar').hide();
				$('#eliminar').hide();
				$('#modificar').show();
			});
			$('#modificar').on('click',function(e){
				e.preventDefault();
				var dat=$('#registraruser').serialize();
				//console.log(dat);
				$.ajax({
	          url:'../php/registros.php',
	          type:'post',
	          data: "valor=modificarProveedor"+"&"+dat,
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
	              $('#registrar').hide();
	              $('#nuevo1').show();
	              $('#modificar').hide();
	          }
	      });
			});
			$('#eliminar').on('click',function(e){
				e.preventDefault();
				var ide=$('#ide').val();
				swal({
		  		title: 'Desea Eliminar al Usuario?',
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
                  data: "valor=anularProveedor&ide="+ide+"",
                  beforeSend:function(){
                      $('.faocu').css('display','inline')
                  },
                  success: function(resp){
                  		if (resp) {
                  			resp="correctamente";
                  		}
                      swal(
                        'Registro Anulado',
                        'Se anulo el usuario '+resp,
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
                      $('#eliminar').hide();
                      $('#editar').hide();
                  }
              });
    		  	}
    		});
			});
		});
	</script>
</head>
<body>
			<div class="mdl-tabs__panel is-active" id="tabNewAdmin">
				<div class="mdl-grid">
					<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--12-col-desktop">
						<div class="full-width panel mdl-shadow--2dp">
							<div class="full-width panel-tittle bg-primary text-center tittles">
								MODIFICAR PROVEEDOR
							</div>
							<div class="full-width panel-content">
								<form name="registraruser" id="registraruser">
									<input type="text" name="ide" id="ide" value="<?php echo $res[0]['id'];?>" style="display:none;">
									<div class="mdl-grid">
										<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--6-col-desktop">
											<h5 class="text-condensedLight">Datos del Proveedor</h5>
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<input class="mdl-textfield__input" type="number" name="carnet" id="carnet" value="<?php echo $res[0]['cod_proveedor']; ?>" readonly>
												<label class="mdl-textfield__label" for="carnet">Carnet de Identidad</label>
												<span class="mdl-textfield__error">Carnet Invalido</span>
											</div>
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<input class="mdl-textfield__input" type="text" pattern="-?[A-Za-záéíóúÁÉÍÓÚ ]*(\.[0-9]+)?" name="razon" id="razon" value="<?php echo $res[0]['razon_proveedor']; ?>" readonly>
												<label class="mdl-textfield__label" for="razon">Nombre del Nit</label>
												<span class="mdl-textfield__error">Nombre Invalido</span>
											</div>
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<input class="mdl-textfield__input" type="number" name="nit" id="nit" value="<?php echo $res[0]['nit_proveedor']; ?>" readonly>
												<label class="mdl-textfield__label" for="nit">Nit</label>
												<span class="mdl-textfield__error">Nit Invalido</span>
											</div>
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<input class="mdl-textfield__input" type="text" pattern="-?[A-Za-záéíóúÁÉÍÓÚ ]*(\.[0-9]+)?" name="representante" id="representante" value="<?php echo $res[0]['representante_proveedor']; ?>" readonly>
												<label class="mdl-textfield__label" for="representante">Representante</label>
												<span class="mdl-textfield__error">Nombre Invalido</span>
											</div>
										</div>
										<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--6-col-desktop">
											<h5 class="text-condensedLight"></h5>
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<input class="mdl-textfield__input" type="text" name="direccion" id="direccion" value="<?php echo $res[0]['direccion_proveedor']; ?>" readonly>
												<label class="mdl-textfield__label" for="direccion">Direccion</label>
												<span class="mdl-textfield__error">Error Direccion</span>
											</div>
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<input class="mdl-textfield__input" type="text" pattern="-?[0-9+()- ]*(\.[0-9]+)?" name="correo" id="correo" value="<?php echo $res[0]['correo_proveedor']; ?>" readonly>
												<label class="mdl-textfield__label" for="correo">Correo Electronico</label>
												<span class="mdl-textfield__error">Error en el Correo</span>
											</div>
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<input class="mdl-textfield__input" type="tel" pattern="-?[0-9+()- ]*(\.[0-9]+)?" name="celular" id="celular" value="<?php echo $res[0]['celular_proveedor']; ?>" readonly>
												<label class="mdl-textfield__label" for="celular">Celular</label>
												<span class="mdl-textfield__error">Celular Invalido</span>
											</div>
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<input class="mdl-textfield__input" type="tel" pattern="-?[0-9+()- ]*(\.[0-9]+)?" name="telefono" id="telefono" value="<?php echo $res[0]['telefono_proveedor']; ?>" readonly>
												<label class="mdl-textfield__label" for="celular">Telefono</label>
												<span class="mdl-textfield__error">Telefono Invalido</span>
											</div>
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<input class="mdl-textfield__input" type="text" name="notas" id="notas" value="<?php echo $res[0]['notas_proveedor']; ?>" readonly>
												<label class="mdl-textfield__label" for="notas">Notas</label>
												<span class="mdl-textfield__error">Error Nombre del Nit</span>
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
										<a href="providers.php" class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored bg-warning" id="volver">
											<i class="zmdi zmdi-arrow-left" style="margin-top:13px;"></i>
										</a>
										<?php 
											}
											if(isset($_SESSION['USUARIO2'])){
										 ?>
										 <a href="providers2.php" class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored bg-warning" id="volver">
											<i class="zmdi zmdi-arrow-left" style="margin-top:13px;"></i>
										</a>
										<?php }?>
										<a href="../php/reportes/transProv1.php?io=<?php echo $ide ?>" class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored bg-info" target="blank" id="imprimir"><i style="margin-top:13px;" class="zmdi zmdi-print"></i>
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


									