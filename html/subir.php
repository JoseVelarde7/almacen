<?php
//Tamaño y Formatos permitidos
require '../php/conectar.php';
/*--------------INGRESAR A LA BASE DE DATOS-------------*/
R::freeze( TRUE );

$res=R::getAll('select max(id) FROM productos');
$ide=$res[0]['max(id)'];

if ((($_FILES["file"]["type"] == "image/gif")
|| ($_FILES["file"]["type"] == "image/jpeg")
|| ($_FILES["file"]["type"] == "image/jpg")
|| ($_FILES["file"]["type"] == "image/JPG")
|| ($_FILES["file"]["type"] == "image/pjpeg"))
&& ($_FILES["file"]["size"] < 1000000)) { 

	    
	    if (file_exists("img/" . $_FILES["file"]["name"])){
	      echo $_FILES["file"]["name"] . " already exists. ";
	    }
	    else{		
	      move_uploaded_file($_FILES["file"]["tmp_name"], "../img/" . $_FILES["file"]["name"]);
		  echo "Almacenado en: " . "../img/" . $_FILES["file"]["name"];
		  $nombreArchivo = $_FILES["file"]["name"];
	      // Muestra la imagen subida
	      $registro=R::load('productos',$ide);
		  $registro->foto_producto=$nombreArchivo;
		  $resp1=R::store($registro);
	      echo "<img src='../img/$nombreArchivo'>";
	      echo "<h2>Archivo Subido Exitosamente</h2> ".$resp1;
	      echo "<a href='productos.php'>Regresar</a> ";
	    }
 
  }
else{
  echo "Archivo invalido, Solamente archivos GIF, JPG y PNG son permitidos";
}
//Muestra informacion del archivo subido
	    /*echo "Upload: ".$_FILES["file"]["name"]."";
	    echo "Type: " . $_FILES["file"]["type"] . "";
	    echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb";
	    echo "Temp file: " . $_FILES["file"]["tmp_name"] . "";*/
	     //Verifica si el archivo existe
?>