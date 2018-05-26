<?php
  $numero=$_GET['factura'];
  $fecha=$_GET['fecha']; 
	$nombre=$_GET['nombre'];
  $nit=$_GET['nit'];
	$total=$_GET['total'];
  $codigo=$_GET['codigo'];
 ?>
<html>
	<head>
		<meta charset="utf-8">
		<title>Factura</title>
	  	<link rel="stylesheet" href="../css/factura.css">
	  	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
			<script>window.jQuery || document.write('<script src="../js/jquery-1.11.2.min.js"><\/script>')</script>
			<script src="../js/invoice.js"></script>
      <script src="../js/jquery.qrcode.min.js"></script>
	</head>
	<body>
		<header>
			<h1>FACTURA</h1>
			<address contenteditable>
				<p>ICARMANU SOLUCIONES</p>
				<p>DE: Daniela Rivas Viamont</p>
        <p>CASA MATRIZ</p>
        <p>Zona: San Antonio Bajo<br>Av. Venezuela #14</p>
				<p>Cel: 79565136 La Paz - Bolivia</p>
			</address>
			<span><img alt="" style="width: 150px;" src="../img/logo.jpg"></span>
		</header>
		<article style="margin-top:-40px;">
			<h1>Recipient</h1>
			<address contenteditable>
				<p><div id="fnombre"><?php echo $nombre;?></div><br><div id="fnit"><?php echo $nit; ?></div></p>
			</address>
      <div align="right">ORIGINAL CLIENTE</div>
			<table class="meta">
				<tr>
					<th><span>Factura #</span></th>
					<td><div id="numberInvoice"><?php echo $numero; ?></div></td>
				</tr>
				<tr>
					<th><span>Fecha de Emisión</span></th>
					<td><span id="fechaInvoice"><?php echo $fecha;?></span></td>
				</tr>
				<tr>
					<th><span>NIT</span></th>
					<td><span>5005515001</span></td>
				</tr>
			</table>
			<table class="inventory">
				<thead>
					<tr>
						<th><span contenteditable>Producto</th>
						<th><span contenteditable>Cantidad</span></th>
						<th><span contenteditable>Precio Unitario</span></th>
						<th><span contenteditable>Subtotal</span></th>
					</tr>
				</thead>
				<tbody class="contenedor31">
					<tr>
						<td><a class="cut">-</a><span contenteditable>Front End Consultation</span></td>
						<td><span data-prefix>$</span><span contenteditable>150.00</span></td>
						<td><span contenteditable>4</span></td>
						<td><span data-prefix>$</span><span>600.00</span></td>
					</tr>
				</tbody>
			</table>
			<!--<a class="add">+</a>-->
			<table class="balance">
				<tr>
					<th><span>Total</span></th>
					<td><span data-prefix>Bs</span><span id="total"><?php echo $total; ?></span></td>
				</tr>
			</table>
			<br>
			<div id="letter">
				Son <?php 
  					$V=new EnLetras(); 
  					$con_letra=strtoupper($V->ValorEnLetras($total," ")); 
  					echo "<b>".$con_letra."</b>"; 
        ?>
      </div>
      <div style="display: inline-block;">Código de Control: 82-7E-29-87-9C</div>
      <div align="right" id="demo"></div>
		</article>
		<aside>
			<h1><span></span></h1>
			<div><div>"ESTA FACTURA CONTRIBUYE AL DESARROLLO DEL PAIS EL USO ILICITO DE ESTA SERA SANCIONADO DE ACUERDO A LEY"</div><br>
        <p>LEY Nro 453: El proveedor deberá entregar el producto en las modalidades y términos ofertados y convenidos</p></div>
			<div style="display: none;">
				Código Venta: <div id="codfactura"></div>
				<p></p>
			</div>
		</aside>
		<!--<div align="center">
			<a href="#" id="">Imprimir</a>
		</div>-->
    
  <script>
    /*$('#guardar').on('click',function(e){
      e.preventDefault();
      $(this).hide();
      var nfactura=$('#numberInvoice').text();
      var nnit=$('#fnit').text();
      var nnombre=$('#fnombre').text();
      var ncfactura=$('#codfactura').text();
      var nfecha=$('#fechaInvoice').text();
      var ntotal=$('#totalInvoice').text();
      console.log(nnombre+" "+nfactura+" "+nnit+" "+nfecha+" "+ntotal+" "+ncfactura);

      $.ajax({
        url:'../php/registros.php',
        type:'post',
        data: "valor=registrarFactura"+"&nombre="+nnombre+"&factura="+nfactura+"&nombrenit="+nnit+"&fecha="+nfecha+"&ntotal="+ntotal+"&ncfactura="+ncfactura,
        beforeSend:function(){
            $('.faocu').css('display','inline')
        },
        success: function(resp){
            console.log(resp);
        },
        error:function(jqXHR,estado,error){
            console.log(error)
        },
        complete:function(jqXHR,estado){
            
        }
      });


      window.print();
    });*/

    $("#demo").qrcode({
      //render:"table"
      width: 80,
      height: 80,
      text: "ICARMANU SOLUCIONES"
    });
  </script> 
	</body>
</html>
<?php 


class EnLetras { 
    var $Void = ""; 
    var $SP = " "; 
    var $Dot = "."; 
    var $Zero = "0"; 
    var $Neg = "Menos"; 
       
    function ValorEnLetras($x, $Moneda )  
    { 
        $s=""; 
        $Ent=""; 
        $Frc=""; 
        $Signo=""; 
             
        if(floatVal($x) < 0) 
         $Signo = $this->Neg . " "; 
        else 
         $Signo = ""; 
         
        if(intval(number_format($x,2,'.','') )!=$x) //<- averiguar si tiene decimales 
          $s = number_format($x,2,'.',''); 
        else 
          $s = number_format($x,2,'.',''); 
            
        $Pto = strpos($s, $this->Dot); 
             
        if ($Pto === false) 
        { 
          $Ent = $s; 
          $Frc = $this->Void; 
        } 
        else 
        { 
          $Ent = substr($s, 0, $Pto ); 
          $Frc =  substr($s, $Pto+1); 
        } 

        if($Ent == $this->Zero || $Ent == $this->Void) 
           $s = "Cero "; 
        elseif( strlen($Ent) > 7) 
        { 
           $s = $this->SubValLetra(intval( substr($Ent, 0,  strlen($Ent) - 6))) .  
                 "Millones " . $this->SubValLetra(intval(substr($Ent,-6, 6))); 
        } 
        else 
        { 
          $s = $this->SubValLetra(intval($Ent)); 
        } 

        if (substr($s,-9, 9) == "Millones " || substr($s,-7, 7) == "Millón ") 
           $s = $s . "de "; 

        $s = $s . $Moneda; 

        if($Frc != $this->Void) 
        { 
           $s = $s . " " . $Frc. "/100"; 
           //$s = $s . " " . $Frc . "/100"; 
        } 
        $letrass=$Signo . $s . " Bolivianos"; 
        return ($Signo . $s . " Bolivianos"); 
        
    } 


    function SubValLetra($numero)  
    { 
        $Ptr=""; 
        $n=0; 
        $i=0; 
        $x =""; 
        $Rtn =""; 
        $Tem =""; 

        $x = trim("$numero"); 
        $n = strlen($x); 

        $Tem = $this->Void; 
        $i = $n; 
         
        while( $i > 0) 
        { 
           $Tem = $this->Parte(intval(substr($x, $n - $i, 1).  
                               str_repeat($this->Zero, $i - 1 ))); 
           If( $Tem != "Cero" ) 
              $Rtn .= $Tem . $this->SP; 
           $i = $i - 1; 
        } 

         
        //--------------------- GoSub FiltroMil ------------------------------ 
        $Rtn=str_replace(" Mil Mil", " Un Mil", $Rtn ); 
        while(1) 
        { 
           $Ptr = strpos($Rtn, "Mil ");        
           If(!($Ptr===false)) 
           { 
              If(! (strpos($Rtn, "Mil ",$Ptr + 1) === false )) 
                $this->ReplaceStringFrom($Rtn, "Mil ", "", $Ptr); 
              Else 
               break; 
           } 
           else break; 
        } 

        //--------------------- GoSub FiltroCiento ------------------------------ 
        $Ptr = -1; 
        do{ 
           $Ptr = strpos($Rtn, "Cien ", $Ptr+1); 
           if(!($Ptr===false)) 
           { 
              $Tem = substr($Rtn, $Ptr + 5 ,1); 
              if( $Tem == "M" || $Tem == $this->Void) 
                 ; 
              else           
                 $this->ReplaceStringFrom($Rtn, "Cien", "Ciento", $Ptr); 
           } 
        }while(!($Ptr === false)); 

        //--------------------- FiltroEspeciales ------------------------------ 
        $Rtn=str_replace("Diez Un", "Once", $Rtn ); 
        $Rtn=str_replace("Diez Dos", "Doce", $Rtn ); 
        $Rtn=str_replace("Diez Tres", "Trece", $Rtn ); 
        $Rtn=str_replace("Diez Cuatro", "Catorce", $Rtn ); 
        $Rtn=str_replace("Diez Cinco", "Quince", $Rtn ); 
        $Rtn=str_replace("Diez Seis", "Dieciseis", $Rtn ); 
        $Rtn=str_replace("Diez Siete", "Diecisiete", $Rtn ); 
        $Rtn=str_replace("Diez Ocho", "Dieciocho", $Rtn ); 
        $Rtn=str_replace("Diez Nueve", "Diecinueve", $Rtn ); 
        $Rtn=str_replace("Veinte Un", "Veintiun", $Rtn ); 
        $Rtn=str_replace("Veinte Dos", "Veintidos", $Rtn ); 
        $Rtn=str_replace("Veinte Tres", "Veintitres", $Rtn ); 
        $Rtn=str_replace("Veinte Cuatro", "Veinticuatro", $Rtn ); 
        $Rtn=str_replace("Veinte Cinco", "Veinticinco", $Rtn ); 
        $Rtn=str_replace("Veinte Seis", "Veintiseís", $Rtn ); 
        $Rtn=str_replace("Veinte Siete", "Veintisiete", $Rtn ); 
        $Rtn=str_replace("Veinte Ocho", "Veintiocho", $Rtn ); 
        $Rtn=str_replace("Veinte Nueve", "Veintinueve", $Rtn ); 

        //--------------------- FiltroUn ------------------------------ 
        If(substr($Rtn,0,1) == "M") $Rtn = "Un " . $Rtn; 
        //--------------------- Adicionar Y ------------------------------ 
        for($i=65; $i<=88; $i++) 
        { 
          If($i != 77) 
             $Rtn=str_replace("a " . Chr($i), "* y " . Chr($i), $Rtn); 
        } 
        $Rtn=str_replace("*", "a" , $Rtn); 
        return($Rtn); 
    } 


    function ReplaceStringFrom(&$x, $OldWrd, $NewWrd, $Ptr) 
    { 
      $x = substr($x, 0, $Ptr)  . $NewWrd . substr($x, strlen($OldWrd) + $Ptr); 
    } 


    function Parte($x) 
    { 
        $Rtn=''; 
        $t=''; 
        $i=''; 
        Do 
        { 
          switch($x) 
          { 
             Case 0:  $t = "Cero";break; 
             Case 1:  $t = "Un";break; 
             Case 2:  $t = "Dos";break; 
             Case 3:  $t = "Tres";break; 
             Case 4:  $t = "Cuatro";break; 
             Case 5:  $t = "Cinco";break; 
             Case 6:  $t = "Seis";break; 
             Case 7:  $t = "Siete";break; 
             Case 8:  $t = "Ocho";break; 
             Case 9:  $t = "Nueve";break; 
             Case 10: $t = "Diez";break; 
             Case 20: $t = "Veinte";break; 
             Case 30: $t = "Treinta";break; 
             Case 40: $t = "Cuarenta";break; 
             Case 50: $t = "Cincuenta";break; 
             Case 60: $t = "Sesenta";break; 
             Case 70: $t = "Setenta";break; 
             Case 80: $t = "Ochenta";break; 
             Case 90: $t = "Noventa";break; 
             Case 100: $t = "Cien";break; 
             Case 200: $t = "Doscientos";break; 
             Case 300: $t = "Trescientos";break; 
             Case 400: $t = "Cuatrocientos";break; 
             Case 500: $t = "Quinientos";break; 
             Case 600: $t = "Seiscientos";break; 
             Case 700: $t = "Setecientos";break; 
             Case 800: $t = "Ochocientos";break; 
             Case 900: $t = "Novecientos";break; 
             Case 1000: $t = "Mil";break; 
             Case 1000000: $t = "Millón";break; 
          } 

          If($t == $this->Void) 
          { 
            $i = $i + 1; 
            $x = $x / 1000; 
            If($x== 0) $i = 0; 
          } 
          else 
             break; 
                
        }while($i != 0); 
        
        $Rtn = $t; 
        Switch($i) 
        { 
           Case 0: $t = $this->Void;break; 
           Case 1: $t = " Mil";break; 
           Case 2: $t = " Millones";break; 
           Case 3: $t = " Billones";break; 
        } 
        return($Rtn . $t); 
    } 

  }


 ?>