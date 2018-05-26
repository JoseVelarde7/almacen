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
	$res=R::getAll('select servicios.id,nombre_servicio,nombre_tipo,descripcion FROM servicios join tiposervicio on tiposervicio.cod_tipo=servicios.cod_tipo');
 ?>

<link rel="stylesheet" href="estiloreporte.css" type="text/css">
<style>
	table tr td{
		padding-top:5px;
		padding-bottom:5px;
		padding-left:5px;
	}
	.tabla .titulo .col1{
		width: 10%;
		text-align: center;
		background: #255682;
		color: #fff;
		font-size: 16px;
	}
	.tabla .titulo .col2{
		width: 30%;
		text-align: center;
		background: #255682;
		color: #fff;
		font-size: 16px;
	}
	.tabla .titulo .col3{
		width: 30%;
		text-align: center;
		background: #255682;
		color: #fff;
		font-size: 16px;
	}
	.tabla .titulo .col4{
		width: 30%;
		text-align: center;
		background: #255682;
		color: #fff;
		font-size: 16px;
	}
	.rojo{
		background: #ffbb00;
	}
</style>
<page backtop="10mm" backbottom"10mm" backleft="20mm" backright="20mm" footer="page" backimg="../../img/logo.jpg" backimgw="15%" backimgx="left" backimgy="top">
	
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
		<h3 align="center">LISTA DE CLIENTES</h3>
	</div>
	<br><br>
	<table class="tabla">
			<tr class="titulo">
				<td class="col1">ID</td>
				<td class="col2">NOMBRE</td>
				<td class="col3">TIPO</td>
				<td class="col4">DESCRIPCION</td>
			</tr>
		<?php 
			foreach ($res as $key => $value) {
				echo "<tr>";
		    foreach ($value as $key2 => $value2) {
		      echo "<td>".$value2."</td>";
		    }
		    echo "</tr>";
		  }
		?>
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
