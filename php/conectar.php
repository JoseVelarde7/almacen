<?php 
require 'rb.php';
	try {
		R::setup( 'mysql:host=localhost;dbname=almacenventa','root', '');
		/*echo "Conectado";*/
	} catch (Exception $e) {
		echo 'Error conectando a la BBDD '.$e->getMessage();
	}

?>