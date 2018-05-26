<?php 
require 'conectar.php';
/*--------------INGRESAR A LA BASE DE DATOS-------------*/
R::freeze( TRUE );
$operacion=$_POST['valor'];
//$operacion='anularTabservicios';	
	/*registrar personal*/
	if($operacion=='registrarPersonal'){
		$codigo=$_POST['carnet'];
		$nombre=$_POST['nombre'];
		$apellido=$_POST['apellido'];
		$cargo=$_POST['cargo'];
		$direccion=$_POST['direccion'];
		$celular=$_POST['celular'];
		$usuario=$_POST['usuario'];
		$pass=$_POST['pass'];
		$nivel=$_POST['options'];
		$registro=R::dispense('usuarios');
		$registro->cod_personal=$codigo;
		$registro->nombre_usuario=$nombre;
		$registro->apellido_usuario=$apellido;
		$registro->cargo_usuario=$cargo;
		$registro->cod_nivel=$nivel;
		$registro->direccion_usuario=$direccion;
		$registro->celular_usuario=$celular;
		$registro->clave_usuario=$pass;
		$registro->usuario_usuario=$usuario;
		$men=R::store($registro);
		echo $men;
	}
	/*modificar personal*/
	if($operacion=='modificarPersonal'){
		$ide=$_POST['ide'];
		$codigo=$_POST['carnet'];
		$nombre=$_POST['nombre'];
		$apellido=$_POST['apellido'];
		$cargo=$_POST['cargo'];
		$direccion=$_POST['direccion'];
		$celular=$_POST['celular'];
		$usuario=$_POST['usuario'];
		$pass=$_POST['pass'];
		$nivel=$_POST['niv'];

		$registro=R::load('usuarios',$ide);
		$registro->cod_personal=$codigo;
		$registro->nombre_usuario=$nombre;
		$registro->apellido_usuario=$apellido;
		$registro->cargo_usuario=$cargo;
		$registro->cod_nivel=$nivel;
		$registro->direccion_usuario=$direccion;
		$registro->celular_usuario=$celular;
		$registro->clave_usuario=$pass;
		$registro->usuario_usuario=$usuario;
		$resp1=R::store($registro);
		echo $resp1;
	}
	/*anular personal*/
	if($operacion=='anularPersonal'){
		$id=$_POST['ide'];
		$registro = R::load('usuarios',$id);
		$res = R::trash($registro);
		echo json_encode($res);
	}
	/*registro de cliente*/
	if($operacion=='registrarCliente'){
		$codigo=$_POST['carnet'];
		$nombre=$_POST['nombre'];
		$fecha=$_POST['fecha'];
		$direccion=$_POST['direccion'];
		$celular=$_POST['celular'];
		$telefono=$_POST['telefono'];
		$nombrenit=$_POST['nombrenit'];
		$nit=$_POST['nit'];
		$correo=$_POST['correo'];
		$registro=R::dispense('clientes');
		$registro->cod_cliente=$codigo;
		$registro->nombre_cliente=$nombre;
		$registro->fecha_cliente=$fecha;
		$registro->direccion_cliente=$direccion;
		$registro->celular_cliente=$celular;
		$registro->telefono_cliente=$telefono;
		$registro->correo_cliente=$correo;
		$registro->nit_cliente=$nit;
		$registro->nombre_nit=$nombrenit;
		$men=R::store($registro);
		echo $men;
	}
	/*modificar cliente*/
	if($operacion=='modificarCliente'){
		$ide=$_POST['ide'];
		$codigo=$_POST['carnet'];
		$nombre=$_POST['nombre'];
		$fecha=$_POST['fecha'];
		$direccion=$_POST['direccion'];
		$celular=$_POST['celular'];
		$telefono=$_POST['telefono'];
		$nombrenit=$_POST['nombrenit'];
		$nit=$_POST['nit'];
		$correo=$_POST['correo'];

		$registro=R::load('clientes',$ide);
		$registro->cod_cliente=$codigo;
		$registro->nombre_cliente=$nombre;
		$registro->fecha_cliente=$fecha;
		$registro->direccion_cliente=$direccion;
		$registro->celular_cliente=$celular;
		$registro->telefono_cliente=$telefono;
		$registro->correo_cliente=$correo;
		$registro->nit_cliente=$nit;
		$registro->nombre_nit=$nombrenit;
		$resp1=R::store($registro);
		echo $resp1;
	}
	/*anular cliente*/
	if($operacion=='anularCliente'){
		$id=$_POST['ide'];
		$registro = R::load('clientes',$id);
		$res = R::trash($registro);
		echo json_encode($res);
	}
	/*registro de proveedor*/
	if($operacion=='registrarProveedor'){
		$codigo=$_POST['carnet'];
		$razon=$_POST['razon'];
		$nit=$_POST['nit'];
		$representante=$_POST['representante'];
		$direccion=$_POST['direccion'];
		$correo=$_POST['correo'];
		$celular=$_POST['celular'];
		$telefono=$_POST['telefono'];
		$notas=$_POST['notas'];
		$registro=R::dispense('proveedores');
		$registro->cod_proveedor=$codigo;
		$registro->razon_proveedor=$razon;
		$registro->representante_proveedor=$representante;
		$registro->nit_proveedor=$nit;
		$registro->direccion_proveedor=$direccion;
		$registro->correo_proveedor=$correo;
		$registro->celular_proveedor=$celular;
		$registro->telefono_proveedor=$telefono;
		$registro->notas_proveedor=$notas;
		$men=R::store($registro);
		echo $men;
	}
	/*modificar proveedor*/
	if($operacion=='modificarProveedor'){
		$ide=$_POST['ide'];
		$codigo=$_POST['carnet'];
		$razon=$_POST['razon'];
		$nit=$_POST['nit'];
		$representante=$_POST['representante'];
		$direccion=$_POST['direccion'];
		$correo=$_POST['correo'];
		$celular=$_POST['celular'];
		$telefono=$_POST['telefono'];
		$notas=$_POST['notas'];

		$registro=R::load('proveedores',$ide);
		$registro->cod_proveedor=$codigo;
		$registro->razon_proveedor=$razon;
		$registro->representante_proveedor=$representante;
		$registro->nit_proveedor=$nit;
		$registro->direccion_proveedor=$direccion;
		$registro->correo_proveedor=$correo;
		$registro->celular_proveedor=$celular;
		$registro->telefono_proveedor=$telefono;
		$registro->notas_proveedor=$notas;
		$resp1=R::store($registro);
		echo $resp1;
	}
	/*anular proveedor*/
	if($operacion=='anularProveedor'){
		$id=$_POST['ide'];
		$registro = R::load('proveedores',$id);
		$res = R::trash($registro);
		echo json_encode($res);
	}
	/*registro de productos*/
	if($operacion=='registrarProducto'){
		$codigo=$_POST['codigo'];
		$nombre=$_POST['nombre'];
		$tipo=$_POST['tipo'];
		$marca=$_POST['marca'];
		$descripcion=$_POST['descripcion'];
		$unidad=$_POST['unidad'];
		$precio=$_POST['precio'];
		$registro=R::dispense('productos');
		$registro->cod_producto=$codigo;
		$registro->cod_unidad=$unidad;
		$registro->precio_productos=$precio;
		$registro->producto_productos=$nombre;
		$registro->cod_categoria=$tipo;
		$registro->descripcion_producto=$descripcion;
		$registro->marca_producto=$marca;
		$registro->foto_producto="";
		$men=R::store($registro);
		echo $men;
	}
	/*modificar productos*/
	if($operacion=='modificarProducto'){
		$ide=$_POST['ide'];
		$codigo=$_POST['codigo'];
		$nombre=$_POST['nombre'];
		$tipo=$_POST['tipo'];
		$marca=$_POST['marca'];
		$descripcion=$_POST['descripcion'];
		$unidad=$_POST['unidad'];
		$precio=$_POST['precio'];
		$registro=R::load('productos',$ide);
		$registro->cod_producto=$codigo;
		$registro->cod_unidad=$unidad;
		$registro->precio_productos=$precio;
		$registro->producto_productos=$nombre;
		$registro->cod_categoria=$tipo;
		$registro->descripcion_producto=$descripcion;
		$registro->marca_producto=$marca;
		$resp1=R::store($registro);
		echo $resp1;
	}
	/*anular proveedor*/
	if($operacion=='anularProducto'){
		$id=$_POST['ide'];
		$registro = R::load('productos',$id);
		$res = R::trash($registro);
		echo json_encode($res);
	}
	/*registro de categoria*/
	if($operacion=='registrarCategoria'){
		$codigo=$_POST['codigo'];
		$nombre=$_POST['nombre'];
		$registro=R::dispense('categoria');
		$registro->cod_categoria=$codigo;
		$registro->nombre_categoria=$nombre;
		$men=R::store($registro);
		echo $men;
	}
	/*registrar unidades*/
	if($operacion=='registrarUnidad'){
		$codigo=$_POST['codigo'];
		$nombre=$_POST['nombre'];
		$registro=R::dispense('unidades');
		$registro->cod_unidad=$codigo;
		$registro->unidad_unidades=$nombre;
		$men=R::store($registro);
		echo $men;
	}
	/*registrar ingreso*/
	if($operacion=='registrarIngreso'){
		$producto=$_POST['producto'];
		$cantidad=$_POST['cantidad'];
		$factura=$_POST['factura'];
		$monto=$_POST['monto'];
		$proveedor=$_POST['proveedor'];
		$precio=$_POST['precio'];
		$fechai=$_POST['fechai'];
		$fechav=$_POST['fechav'];
		$personal=$_POST['personal'];
		$notas=$_POST['notas'];
		$registro=R::dispense('adquisicion');
		$registro->cantidad_ad=$cantidad;
		$registro->factura_ad=$factura;
		$registro->fechai_ad=$fechai;
		$registro->fechav_ad=$fechav;
		$registro->cod_producto=$producto;
		$registro->cod_proveedor=$proveedor;
		$registro->monto_ad=$monto;
		$registro->precio_ad=$precio;
		$registro->cod_personal=$personal;
		$registro->notas_ad=$notas;
		$men=R::store($registro);
		$res=R::getAll('select COUNT(id),id,cantidad FROM almacen WHERE cod_producto='.$producto.'');
		if ($res[0]['COUNT(id)']!=0) {
			$newCantidad=$res[0]['cantidad']+$cantidad;
			$registro=R::load('almacen',$res[0]['id']);
			$registro->cantidad=$newCantidad;
			$registro->fechai=$fechai;
			$registro->fechav=$fechav;
			$registro->precio=$precio;
			$resp1=R::store($registro);
		}else{
			$registro=R::dispense('almacen');
			$registro->cod_producto=$producto;
			$registro->cantidad=$cantidad;
			$registro->fechai=$fechai;
			$registro->fechav=$fechav;
			$registro->precio=$precio;
			$men2=R::store($registro);
		}
		echo $men;
	}
	/*modificar ingreso*/
	if($operacion=='modificarIngreso'){
		$ide=$_POST['ide'];
		$res=R::getAll('select cantidad_ad FROM adquisicion WHERE id='.$ide.'');
		$producto=$_POST['producto'];
		$cantidad=$_POST['cantidad'];
		$factura=$_POST['factura'];
		$monto=$_POST['monto'];
		$proveedor=$_POST['proveedor'];
		$precio=$_POST['precio'];
		$fechai=$_POST['fechai'];
		$fechav=$_POST['fechav'];
		$personal=$_POST['personal'];
		$notas=$_POST['notas'];
		$registro=R::load('adquisicion',$ide);
		$registro->cantidad_ad=$cantidad;
		$registro->factura_ad=$factura;
		$registro->fechai_ad=$fechai;
		$registro->fechav_ad=$fechav;
		$registro->cod_producto=$producto;
		$registro->cod_proveedor=$proveedor;
		$registro->monto_ad=$monto;
		$registro->precio_ad=$precio;
		$registro->cod_personal=$personal;
		$registro->notas_ad=$notas;
		$resp1=R::store($registro);
		if ($res[0]['cantidad_ad']!=$cantidad) {
			$res2=R::getAll('select id,cantidad FROM almacen WHERE cod_producto='.$producto.'');
			if ($res[0]['cantidad_ad']>$cantidad) {
				$resta=$res[0]['cantidad_ad']-$cantidad;
				$newCantidad=$res2[0]['cantidad']-$resta;
				$registro=R::load('almacen',$res2[0]['id']);
				$registro->cantidad=$newCantidad;
				$registro->fechai=$fechai;
				$registro->fechav=$fechav;
				$registro->precio=$precio;
				$resp1=R::store($registro);	
			}else{
				$suma=$cantidad-$res[0]['cantidad_ad'];
				$newCantidad=$res2[0]['cantidad']+$suma;
				$registro=R::load('almacen',$res2[0]['id']);
				$registro->cantidad=$newCantidad;
				$registro->fechai=$fechai;
				$registro->fechav=$fechav;
				$registro->precio=$precio;
				$resp1=R::store($registro);	
			}
		}
		echo $resp1;
	}
	/*anular ingreso*/
	if($operacion=='anularIngreso'){
		$id=$_POST['ide'];
		$res3=R::getAll('select cod_producto,cantidad_ad FROM adquisicion WHERE id='.$id.'');
		$registro = R::load('adquisicion',$id);
		$res = R::trash($registro);
		$res4=R::getAll('select id,cantidad FROM almacen WHERE cod_producto='.$res3[0]['cod_producto'].'');
		$newCantidad=$res4[0]['cantidad']-$res3[0]['cantidad_ad'];
		$registro=R::load('almacen',$res4[0]['id']);
		$registro->cantidad=$newCantidad;
		$resp1=R::store($registro);
		echo json_encode($res);
	}
	/*registro de servicio*/
	if($operacion=='registrarServicio'){
		$codigo=$_POST['codigo3'];
		$nombre=$_POST['nombre3'];
		$descripcion=$_POST['descripcion3'];
		$registro=R::dispense('tiposervicio');
		$registro->cod_tipo=$codigo;
		$registro->nombre_tipo=$nombre;
		$registro->description_tipo=$descripcion;
		$men=R::store($registro);
		echo $men;
	}
	/*modificar servicio*/
	if($operacion=='modificarServicio'){
		$ide=$_POST['ide'];
		$codigo=$_POST['codigo'];
		$nombre=$_POST['nombre'];
		$descripcion=$_POST['descripcion'];
		$registro=R::load('tiposervicio',$ide);
		$registro->cod_tipo=$codigo;
		$registro->nombre_tipo=$nombre;
		$registro->description_tipo=$descripcion;
		$resp1=R::store($registro);
		echo $resp1;
	}
	/*anular servicio*/
	if($operacion=='anularServicio'){
		$id=$_POST['ide'];
		$registro = R::load('tiposervicio',$id);
		$res = R::trash($registro);
		echo json_encode($res);
	}
	/*registrar venta*/
	if($operacion=='registrarVenta'){
		$codcli=$_POST['codcli'];
		$codper=$_POST['codper'];
		$producto=$_POST['producto'];
		$codpro=$_POST['codpro'];
		$total=$_POST['total'];
		$notas=$_POST['notas'];
		$tabla=$_POST['tabla'];
		$fecha=date("Y-m-d");
		$codigoVenta=date("ymdgis");
		$array = explode(",", $tabla);
		$registro=R::dispense('venta');
		$registro->cod_venta=$codigoVenta;
		$registro->fecha_venta=$fecha;
		$registro->cod_personal=$codper;
		$registro->cod_cliente=$codcli;
		$registro->total_venta=$total;
		$registro->notas_venta=$notas;
		$men=R::store($registro);
		$contar=(count($array))-1;
		$filas=($contar/5);
		$j=1;
		for ($i=1; $i <=$filas ; $i++) { 
			$registro1=R::dispense('descargos');
			$registro1->cod_venta=$codigoVenta;
			$codigoProducto=$array[$j++];
			$registro1->cod_producto=$codigoProducto;
			$registro1->cod_descuento='SINDESC';
			$registro1->cod_servicio='SINSER';
			$registro1->item_descargo=$array[$j++];
			$cantidadProducto=$array[$j++];
			$registro1->cantidad_descargo=$cantidadProducto;
			$registro1->precio_producto=$array[$j++];
			$registro1->total_descargo=$array[$j++];
			$men2=R::store($registro1);
				$res2=R::getAll('select id,cantidad FROM almacen WHERE cod_producto='.$codigoProducto.'');
				$newCantidad=$res2[0]['cantidad']-$cantidadProducto;
				$registro2=R::load('almacen',$res2[0]['id']);
				$registro2->cantidad=$newCantidad;
				$resp1=R::store($registro2);
		}
		echo $men;
	}
	/*anular venta*/
	if($operacion=='anularVenta'){
		$id=$_POST['ide'];
		$books = R::getAll( 'select id,cod_producto,cantidad_descargo FROM descargos WHERE cod_venta = :title',[':title' => $id]);
	    foreach( $books as $book ) {
	        $registro = R::load('descargos',$book['id']);
			$res = R::trash($registro);
			$resta= R::exec( 'update almacen set cantidad=cantidad+'.$book['cantidad_descargo'].' where cod_producto='.$book['cod_producto']);
	 	}
	 	$books2 = R::getAll( 'select id FROM venta WHERE cod_venta = :title',[':title' => $id]);
	    foreach( $books2 as $book2 ) {
	        $registro2 = R::load('venta',$book2['id']);
			$res2 = R::trash($registro2);
	 	}
		echo json_encode($res2);
	}
	/*registrar servicio*/
	if($operacion=='registrarService'){
		$tipo=$_POST['tipo'];
		$nombre=$_POST['nombre'];
		$descripcion=$_POST['descripcion'];
		$codi=date("ymdgis");
		$registro=R::dispense('servicios');
		$registro->cod_servicio=$codi;
		$registro->nombre_servicio=$nombre;
		$registro->cod_tipo=$tipo;
		$registro->descripcion=$descripcion;
		$men=R::store($registro);
		echo $men;
	}
	/*modificar servicio*/
	if($operacion=='modificarServ'){
		$ide=$_POST['ide'];
		$tipo=$_POST['tipo'];
		$nombre=$_POST['nombre'];
		$descripcion=$_POST['descripcion'];
		$registro=R::load('servicios',$ide);
		$registro->nombre_servicio=$nombre;
		$registro->cod_tipo=$tipo;
		$registro->descripcion=$descripcion;
		$resp1=R::store($registro);
		echo $resp1;
	}
	/*anular serv*/
	if($operacion=='anularServ'){
		$id=$_POST['ide'];
		$registro = R::load('servicios',$id);
		$res = R::trash($registro);
		echo json_encode($res);
	}
	if($operacion=='registrarServ'){
		$codcli=$_POST['codcli'];
		$codper=$_POST['codper'];
		$total=$_POST['total'];
		$notas=$_POST['notas'];
		$tabla=$_POST['tabla'];
		$fecha=date("Y-m-d");
		$codigoVenta=date("ymdgis");
		$array = explode(",", $tabla);
		$contar=(count($array))-1;
		$filas=($contar/3);
		$j=1;
		for ($i=1; $i <=$filas ; $i++) { 
			$registro1=R::dispense('tabservicios');
			$registro1->cod_servicio=$array[$j++];
			$registro1->nombre_servicio=$array[$j++];
			$registro1->fecha_servicio=$fecha;
			$registro1->cod_personal=$codper;
			$registro1->cod_cliente=$codcli;
			$registro1->costo_servicio=$array[$j++];
			$registro1->notas=$notas;
			$registro1->codigoventa=$codigoVenta;
			$men2=R::store($registro1);	
		}
		echo $men2;
	}
	/*anular venta*/
	if($operacion=='anularTabservicios'){
		$codigo=$_POST['codcli'];
		$fecha=$_POST['fecha'];
		$books = R::getAll('select id FROM tabservicios WHERE cod_cliente=:cliente and fecha_servicio=:fecha',[':cliente' => $codigo,':fecha' => $fecha]);
		/*$books = R::getAll('select id FROM tabservicios WHERE cod_cliente=:cliente',[':cliente' => $codigo]);*/
	    foreach( $books as $book ) {
	        $registro = R::load('tabservicios',$book['id']);
			$res = R::trash($registro);
	 	}
	 	/*$books2 = R::getAll( 'select id FROM venta WHERE cod_venta = :title',[':title' => $id]);
	    foreach( $books2 as $book2 ) {
	        $registro2 = R::load('venta',$book2['id']);
			$res2 = R::trash($registro2);
	 	}*/
		echo json_encode($books);
	}

	if($operacion=='modificarEmpresa'){
		$ide=$_POST['ide1'];
		$nombre=$_POST['n_nombre'];
		$razon=$_POST['n_razon'];
		$nit=$_POST['n_nit'];
		$rep=$_POST['representante'];
		$direccion=$_POST['n_direccion'];
		$celular=$_POST['n_celular'];
		$telefono=$_POST['n_telefono'];
		$notas=$_POST['notas'];

		$registro=R::load('empresas',$ide);
		$registro->empresa_nombre=$nombre;
		$registro->empresa_direccion=$direccion;
		$registro->empresa_telefono=$telefono;
		$registro->empresa_celular=$celular;
		$registro->empresa_nomnit=$razon;
		$registro->empresa_nit=$nit;
		$registro->empresa_obs=$notas;
		$registro->empresa_propietario=$rep;
		$resp1=R::store($registro);
		echo $resp1;
	}
	if($operacion=='registrarFactura'){
		$nombre=$_POST['nombre'];
		$factura=$_POST['factura'];
		$nnit=$_POST['nombrenit'];
		$fecha=$_POST['fecha'];
		$total=$_POST['ntotal'];
		$cod=$_POST['ncfactura'];

		$registro=R::dispense('facturas');
		$registro->factura=$factura;
		$registro->nombre=$nombre;
		$registro->nit=$nnit;
		$registro->codventa=$cod;
		$registro->fecha=$fecha;
		$registro->total=$total;
		$men=R::store($registro);
		echo $men;
	}
	if($operacion=='registrarSegui'){
		$codigo=$_POST['cod'];
		$nota=$_POST['nota'];
		$fecha=date("Y-m-d");

		$registro=R::dispense('seguimiento');
		$registro->codseg=$codigo;
		$registro->fecha=$fecha;
		$registro->notas=$nota;
		$men=R::store($registro);
		echo $men;
	}
	if($operacion=='terminar'){
		$ide=$_POST['ide'];
		$fecha=date("Y-m-d");

		$registro=R::load('tabservicios',$ide);
		$registro->fechafi=$fecha;
		$resp1=R::store($registro);
		echo $resp1;
	}
	function generacodigo($ci){
		return "PAC".$ci;
	}
	function pacienteCodigo($nombre){
		$encontrar=R::find('paciente','nombre="'.$nombre.'"');
		return($encontrar);
	}
	function personalCodigo($nombre){
		$encontrar=R::find('bioquimico','nombre="'.$nombre.'"');
		return($encontrar);
	}
	function almacenmenos($ide,$cantidad){
		$encontrar=R::findOne( 'almacen', ' idproducto = ? ', [$ide] );
		$res=0;
		if ($encontrar==null) {
			$res=0;
		}else{
			$res=($encontrar->cantidad)-$cantidad;
		}
		return ($res);
	}
	function almacenid($ide){
		$encontrar=R::findOne( 'almacen', ' idproducto = ? ', [$ide] );
		$res=0;
		if ($encontrar==null) {
			$res=0;
		}else{
			$res=($encontrar->id);
		}
		return ($res);
	}
 ?>