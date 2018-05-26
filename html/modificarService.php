<?php 
	$ide=$_GET['id'];
  require '../php/conectar.php';
  $res=R::getAll('select id,cod_servicio,nombre_servicio,cod_tipo,descripcion FROM servicios WHERE id='.$ide.'');
  $tipos=R::getAll('select cod_tipo,nombre_tipo FROM tiposervicio');
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
				$("#nombre,#descripcion").removeAttr("readonly");
				$('#editar').hide();
				$('#eliminar').hide();
				$('#modificar').show();
			});
			$('#modificar').on('click',function(e){
				e.preventDefault();
				var dat=$('#registrarService').serialize();
				//console.log(dat);
				$.ajax({
	          url:'../php/registros.php',
	          type:'post',
	          data: "valor=modificarServ"+"&"+dat,
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
		  		title: 'Desea Eliminar Servicio?',
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
	                  data: "valor=anularServ&ide="+ide+"",
	                  beforeSend:function(){
	                      $('.faocu').css('display','inline')
	                  },
	                  success: function(resp){
	                  		if (resp) {
	                  			resp="correctamente";
	                  		}
	                      swal(
	                        'Servicio Anulado',
	                        'Se anulo el Servicio '+resp,
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
						Ver Servicio
					</div>
					<div class="full-width panel-content">
						<div class="full-width panel-content">
								<form name="registrarService" id="registrarService">
									<input type="text" name="ide" id="ide" value="<?php echo $res[0]['id'];?>" style="display:none;">
									<div class="mdl-grid">
										<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--12-col-desktop">
											<h5 class="text-condensedLight">Nombre del Servicio</h5>
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<input class="mdl-textfield__input" type="text" name="nombre" id="nombre" value="<?php echo $res[0]['nombre_servicio']; ?>" readonly>
												<label class="mdl-textfield__label" for="carnet">Nombre del Servicio</label>
												<span class="mdl-textfield__error">Nombre Invalido</span>
											</div>
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<div class="mdl-textfield mdl-js-textfield">
												<select class="mdl-textfield__input" id="tipo" name="tipo">
													<?php 
															$d=[];
															foreach ($tipos as $key => $value) {
																foreach ($value as $key1 => $value1) {
																	$d[]=$value1;
																}
																if ($d[0]==$res[0]['cod_tipo']) {
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
											</div>
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<textarea class="mdl-textfield__input" name="descripcion" id="descripcion" maxlength="150" cols="30" rows="2" readonly><?php echo $res[0]['descripcion'];?></textarea>
												<label class="mdl-textfield__label" for="descripcion">Descripcion del Servicio</label>
												<span class="mdl-textfield__error">Descripcion Invalida</span>
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
										<a href="service.php" class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored bg-warning" id="volver">
											<i class="zmdi zmdi-arrow-left" style="margin-top:13px;"></i>
										</a>
										<div class="mdl-tooltip" for="editar">Editar</div>
										<div class="mdl-tooltip" for="volver">Regresar</div>
										<div class="mdl-tooltip" for="modificar">Modificar</div>
										<div class="mdl-tooltip" for="eliminar">Eliminar</div>
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
	</div>
</body>
</html> 

							