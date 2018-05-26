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
	$res=R::getAll('select item_descargo,precio_producto,cantidad_descargo,total_descargo FROM descargos WHERE cod_venta='.$codigo);
	$datos=[];
	  foreach ($res as $key => $value) {
	    foreach ($value as $key2 => $value2) {
	      $datos[]=$value2;
	    }
	  }
	$res2=R::getAll('select fecha_venta,nombre_cliente,total_venta FROM venta join clientes on clientes.cod_cliente=venta.cod_cliente WHERE cod_venta='.$codigo);
	$datos2=[];
	  foreach ($res2 as $key2 => $val) {
	   	$dato2[]=$val;
	  }
 ?>

<link rel="stylesheet" href="estiloreporte.css" type="text/css">
<style>
	.tabla .titulo .col1{
		width: 5%;
		text-align: center;
	}
	.tabla .titulo .col2{
		width: 20%;
		text-align: center;
	}
	.tabla .titulo .col3{
		width: 20%;
		text-align: center;
	}
	.tabla .titulo .col4{
		width: 10%;
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
		<h3 align="center">CLIENTE: <?php echo ($res2[0]['nombre_cliente']); ?></h3>
	</div>
	<br><br>
	<table class="tabla">
			<tr class="titulo">
				<td class="col1">PRODUCTO</td>
				<td class="col2">PRECIO</td>
				<td class="col3">CANTIDAD</td>
				<td class="col4">TOTAL</td>
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
	<br>
	<div class="caja1">
		<h3 align="center">TOTAL VENTA: <?php echo ($res2[0]['total_venta']); ?></h3>
	</div>
	<div class="caja1">
		<h3 align="center">FECHA DE VENTA: <?php echo ($res2[0]['fecha_venta']); ?></h3>
	</div>
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
