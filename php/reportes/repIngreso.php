
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
	$res=R::getAll('select adquisicion.id,producto_productos,razon_proveedor,cantidad_ad,fechai_ad,precio_productos,cantidad_ad*precio_productos FROM adquisicion INNER join productos ON productos.cod_producto=adquisicion.cod_producto INNER JOIN proveedores ON proveedores.cod_proveedor=adquisicion.cod_proveedor ORDER BY adquisicion.id');
 ?>

<link rel="stylesheet" href="estiloreporte.css" type="text/css">
<style>
	table tr td{
		padding-top:3px;
		padding-bottom:3px;
		padding-left:0px;
	}
	.tabla .titulo .col1{
		width: 10%;
		text-align: center;
		background: #255682;
		color: #fff;
		font-size: 16px;
	}
	/*.tabla .titulo .col2{
		width: 10%;
		text-align: center;
		background: #255682;
		color: #fff;
		font-size: 16px;
	}
	.tabla .titulo .col3{
		width: 10%;
		text-align: center;
		background: #255682;
		color: #fff;
		font-size: 16px;
	}
	.tabla .titulo .col4{
		width: 10%;
		text-align: center;
		background: #255682;
		color: #fff;
		font-size: 16px;
	}
	.tabla .titulo .col5{
		width: 10%;
		text-align: center;
		background: #255682;
		color: #fff;
		font-size: 16px;
	}
	}
	.tabla .titulo .col6{
		width: 10%;
		text-align: center;
		background: #255682;
		color: #fff;
		font-size: 16px;
	}
	}
	.tabla .titulo .col7{
		width: 10%;
		text-align: center;
		background: #255682;
		color: #fff;
		font-size: 16px;
	}
	.tabla .titulo .col8{
		width: 10%;
		text-align: center;
		background: #255682;
		color: #fff;
		font-size: 16px;
	}*/
	.rojo{
		background: #ffbb00;
	}
</style>
<page backtop="10mm"  backbottom"10mm" backleft="20mm" backright="20mm" footer="page" backimg="../../img/logo.jpg" backimgw="15%" backimgx="left" backimgy="top">
	
	<page_header>
		
	</page_header>	

	<div class="caja1">
		<h3 align="center">KARDEX DE ENTRADA</h3>
	</div>
	<br><br>
	<table class="tabla">
			<tr class="titulo"> 
				<td class="col1">CODIGO</td>
				<td class="col1">PRODUCTO</td>
				<td class="col1">PROVEEDOR</td>
				<td class="col1">CANTIDAD DE INGRESO</td>
				<td class="col1">FECHA DE INGRESO</td>
				<td class="col1">PRECIO UNIDAD</td>
				<td class="col1">MONTO TOTAL</td>
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
