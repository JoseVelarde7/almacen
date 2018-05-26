
<?php
	include("../conectar.php");
	set_time_limit(600);
	$dia=date("d");
	$m=date("m");
	$mes=nombremes($m);
	$anio=date("Y");
	//$hora=date("H-i-s");
	function nombremes($num){
		switch ($num) {
			case '1': return "Enero"; break;
			case '2': return "Febrero"; break;
			case '3': return "Marzo"; break;
			case '4': return "Abril"; break;
			case '5': return "Mayo"; break;
			case '6': return "Junio"; break;
			case '7': return "Julio"; break;
			case '8': return "Agosto"; break;
			case '9': return "Septiembre;"; break;
			case '10': return "Octubre"; break;
			case '11': return "Noviembre"; break;
			case '12': return "Diciembre"; break;
			
			default:
				return "error";
				break;
		}
	}
	$codigo=$_GET['io'];
	$res=R::getAll('select nombre_usuario,apellido_usuario,cod_personal,cargo_usuario,cod_nivel,direccion_usuario,celular_usuario,clave_usuario,usuario_usuario FROM usuarios where id='.$codigo);
	$datos=[];
	  foreach ($res as $key => $value) {
	    foreach ($value as $key2 => $value2) {
	      $datos[]=$value2;
	    }
	  }
 ?>

<link rel="stylesheet" href="estiloreporte.css" type="text/css">
<style>
	.tabla .titulo .col1{
		width: 30%;
		text-align: center;
	}
	.tabla .titulo .col2{
		width: 70%;
		text-align: center;
	}
	.rojo{
		background: #ffbb00;
	}
</style>
<page backtop="10mm" backbottom"10mm" backleft="20mm" backright="20mm" footer="page">
	
	<page_header>
		<!--<table id="encabezado">
			<tr class="fila">
				<td id="col1" class="">
					<img src="../../../img/alianzalogo1.png">
				</td> 
				<td id="col2">
					
				</td>
				<td id="col3">
					
				</td>
			</tr>
		</table>-->
	</page_header>	

	<div class="caja1">
		<h3 align="center">USUARIO: <?php echo $datos[0]." ".$datos[1];?></h3>
	</div>
	<br><br>
	<table class="tabla">
		<tr class="titulo">
			<td class="col1">#</td>
			<td class="col2">DATOS</td>
		</tr>
		<tr>
				<td class="col1">CARNET</td>
				<td class="col2"><?php echo $datos[2];?></td>
			</tr>
			<tr>
				<td class="col1">CARGO</td>
				<td class="col2"><?php echo $datos[3];?></td>
			</tr>
			<tr>
				<td class="col1">NIVEL</td>
				<td class="col2"><?php echo $datos[4];?></td>
			</tr>
			<tr>
				<td class="col1">DIRECCION</td>
				<td class="col2"><?php echo $datos[5];?></td>
			</tr>
			<tr>
				<td class="col1">CELULAR</td>
				<td class="col2"><?php echo $datos[6];?></td>
			</tr>
			<tr>
				<td class="col1">CLAVE</td>
				<td class="col2"><?php echo $datos[7];?></td>
			</tr>
			<tr>
				<td class="col1">USUARIO</td>
				<td class="col2"><?php echo $datos[8];?></td>
			</tr>
	</table>
	
	<page_footer>
		<table id="pie">
			<tr class="fila">
				<td>
					<span>Fecha de Impresion <?php echo $dia." de ".$mes." de ".$anio ?></span>
				</td>
			</tr>
		</table>
	</page_footer>
</page>
