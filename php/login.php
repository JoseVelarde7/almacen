<?PHP
	require 'conectar.php';
	session_start();
	//R::debug( TRUE );
	$usuario=$_GET['usuario'];
	$pass=$_GET['pass'];
	$nombre="";
	//$nuevoarray={};
	if($usuario!="" && $pass!=""){
		$encontrar=R::getAll('select cod_nivel,apellido_usuario,usuario_usuario,clave_usuario,cargo_usuario FROM usuarios WHERE clave_usuario='.$pass.' and usuario_usuario="'.$usuario.'"');
		if($encontrar){
			foreach ($encontrar as $key) {
				$nuevoarray=$key;
			}
			$nombre=$nuevoarray['usuario_usuario'];
			$clave=$nuevoarray['cod_nivel'];
			$cargo=$nuevoarray['cargo_usuario'];
			$apellido=$nuevoarray['apellido_usuario'];
			if ($clave=='usuario1') {
				$_SESSION['ADMIN']=$nombre." ".$apellido;
			}else if ($clave=='usuario2') {
				$_SESSION['USUARIO2']=$nombre." ".$apellido;
			}else{
				$_SESSION['USUARIO3']=$nombre." ".$apellido;
			}
			echo ($clave);
		}else{
			$_SESSION['error'] ="Login incorrecto !!! ";
			echo "Usuario o Password Incorrecto";
		}	
	}
	else {
	$_SESSION['llene'] = "Lene los campos";
		echo "Usuario o Password Incorrecto";
	}
?>