<?php
$operacion=$_GET['evento'];
//$operacion="mostrarFactura2";
require 'conectar.php';
	if($operacion=='mostrarUsuarios'){
		$res=R::getAll('select id,cod_personal,nombre_usuario,apellido_usuario,cargo_usuario FROM usuarios');
		echo json_encode($res);
	}
	if($operacion=='mostrarClientes'){
		$res=R::getAll('select id,cod_cliente,nombre_cliente,direccion_cliente FROM clientes');
		echo json_encode($res);
	}
	if($operacion=='mostrarProveedores'){
		$res=R::getAll('select id,razon_proveedor,representante_proveedor,direccion_proveedor,celular_proveedor FROM proveedores');
		echo json_encode($res);
	}
	if($operacion=='mostrarEmpresa'){
		$res=R::getAll('select id,empresa_nombre,empresa_direccion,empresa_telefono,empresa_celular,empresa_nomnit,empresa_nit,empresa_tipo,empresa_obs,empresa_propietario FROM empresas');
		echo json_encode($res);
	}
	if($operacion=='buscarUsuarios'){
		$nombre=$_GET['nombre'];
		$res=R::getAll("select id,nombre_usuario,apellido_usuario,cargo_usuario FROM `usuarios` WHERE `nombre_usuario` LIKE '%"+$nombre+"%'");
		echo json_encode($res);
	}
	if($operacion=='mostrarUnidades'){
		$res=R::getAll('select cod_unidad,unidad_unidades FROM unidades');
		echo json_encode($res);
	}
	if($operacion=='mostrarCategoria'){
		$res=R::getAll('select cod_categoria,nombre_categoria FROM categoria');
		echo json_encode($res);
	}
	if($operacion=='mostrarProductos'){
		//$res=R::getAll('select id,cod_producto,precio_productos,producto_productos,marca_producto,foto_producto FROM productos');
		$res=R::getAll('select productos.id,productos.cod_producto,precio_productos,producto_productos,marca_producto,foto_producto,almacen.cantidad FROM productos JOIN almacen on almacen.cod_producto=productos.cod_producto');
		echo json_encode($res);
	}
	if($operacion=='mostrarProductos2'){
		$res=R::getAll('select id,cod_producto,precio_productos,producto_productos,marca_producto,foto_producto FROM productos');
		echo json_encode($res);
	}
	if($operacion=='selectProducto'){
		$res=R::getAll('select cod_producto,producto_productos FROM productos');
		echo json_encode($res);
	}
	if($operacion=='selectProveedor'){
		$res=R::getAll('select cod_proveedor,razon_proveedor FROM proveedores');
		echo json_encode($res);
	}
	if($operacion=='selectPersonal'){
		$res=R::getAll('select cod_personal,nombre_usuario,apellido_usuario FROM usuarios');
		echo json_encode($res);
	}
	if($operacion=='mostrarIngresos'){
		$res=R::getAll('select adquisicion.id,producto_productos,cantidad_ad,razon_proveedor,fechai_ad FROM adquisicion INNER join productos ON productos.cod_producto=adquisicion.cod_producto INNER JOIN proveedores ON proveedores.cod_proveedor=adquisicion.cod_proveedor ORDER BY adquisicion.id desc');
		echo json_encode($res);
	}
	if($operacion=='mostrarInventario'){
		$res=R::getAll('select almacen.id,producto_productos,cantidad,precio FROM almacen JOIN productos ON productos.cod_producto=almacen.cod_producto');
		echo json_encode($res);
	}
	if($operacion=='mostrarServicios'){
		$res=R::getAll('select id,cod_tipo,nombre_tipo,description_tipo FROM tiposervicio ORDER BY id DESC');
		echo json_encode($res);
	}
	if($operacion=='mostrarVentas'){
		$res=R::getAll('select venta.id,cod_venta,fecha_venta,cod_personal,nombre_cliente,total_venta,notas_venta FROM venta JOIN clientes ON clientes.cod_cliente=venta.cod_cliente order by venta.id desc');
		echo json_encode($res);
	}
	if($operacion=='mostrarVen'){
		$codigo=$_GET['cod'];
		$res=R::getAll('select item_descargo,cantidad_descargo,precio_producto,total_descargo FROM descargos WHERE cod_venta='.$codigo.'');
		echo json_encode($res);
	}
	if($operacion=='showiservice'){
		$codigo=$_GET['cod'];
		$res=R::getAll('select nombre_servicio, costo_servicio from tabservicios WHERE codigoventa='.$codigo.'');
		echo json_encode($res);
	}
	if($operacion=='mostrarVen2'){
		$codigo=$_GET['cod'];
		$res=R::getAll('select nombre_servicio,costo_servicio FROM tabservicios WHERE codigoventa="'.$codigo.'"');
		echo json_encode($res);
	}
	if($operacion=='mostrarServ'){
		$res=R::getAll('select id,cod_servicio,nombre_servicio,descripcion FROM servicios ORDER BY id DESC');
		echo json_encode($res);
	}
	if($operacion=='mostrarTabservicios'){
		$res=R::getAll('select fecha_servicio,tabservicios.cod_cliente,nombre_cliente,costo_servicio,notas,codigoventa FROM tabservicios JOIN clientes ON clientes.cod_cliente=tabservicios.cod_cliente GROUP BY tabservicios.cod_cliente,fecha_servicio ORDER BY fecha_servicio DESC');
		echo json_encode($res);
	}
	if($operacion=='showServicios'){
		$codigo=$_GET['cod'];
		$res=R::getAll('select nombre_servicio,costo_servicio FROM tabservicios WHERE codigoventa="'.$codigo.'"');
		echo json_encode($res);
	}
	if($operacion=='showEstadisticas'){
		$res=R::getAll('select count(id) FROM usuarios');
		echo json_encode($res);
	}
	if($operacion=='showEclientes'){
		$res=R::getAll('select count(id) FROM clientes');
		echo json_encode($res);
	}
	if($operacion=='showEproveedor'){
		$res=R::getAll('select count(id) FROM proveedores');
		echo json_encode($res);
	}
	if($operacion=='showEproducto'){
		$res=R::getAll('select count(id) FROM productos');
		echo json_encode($res);
	}
	if($operacion=='showEventas'){
		$res=R::getAll('select count(id) FROM venta');
		echo json_encode($res);
	}
	if($operacion=='showGventas'){
		$res=R::getAll('select producto_productos,sum(descargos.cantidad_descargo) FROM descargos INNER join productos on descargos.cod_producto=productos.cod_producto GROUP by descargos.cod_producto ORDER by producto_productos ASC');
		echo json_encode($res);
	}
	if($operacion=='showGstock'){
		$res=R::getAll('select producto_productos,almacen.cantidad FROM almacen INNER join productos on almacen.cod_producto=productos.cod_producto');
		echo json_encode($res);
	}
	if($operacion=='showTrabajos'){
		$ide=$_GET['ide'];
		$res=R::getAll('select fecha_servicio,nombre_servicio,costo_servicio,notas FROM tabservicios WHERE cod_cliente='.$ide.'');
		echo json_encode($res);
	}
	if($operacion=='mostrarFactura1'){
		$name=$_GET['name'];
		/*$res=R::getAll('select max(venta.id),cod_venta,fecha_venta,cod_personal,nombre_cliente,total_venta,notas_venta FROM venta JOIN clientes ON clientes.cod_cliente=venta.cod_cliente where nombre_cliente="'.$name.'"');*/
		$res=R::getAll('select MAX(cod_venta) FROM venta');
		echo json_encode($res);
	}
	if($operacion=='mostrarFactura2'){
		$name=$_GET['name'];
		//$name='BERTHA BLANCO';
		/*$res=R::getAll('select max(venta.id),cod_venta,fecha_venta,cod_personal,nombre_cliente,total_venta,notas_venta FROM venta JOIN clientes ON clientes.cod_cliente=venta.cod_cliente where nombre_cliente="'.$name.'"');*/
		$res=R::getAll('select max(tabservicios.codigoventa) from tabservicios join clientes on clientes.cod_cliente=tabservicios.cod_cliente where nombre_cliente="'.$name.'"');
		echo json_encode($res);
	}
	if($operacion=='numeroFactura'){
		$res=R::getAll('select count(*)+1 FROM facturas');
		echo json_encode($res);
	}
	if($operacion=='datproducto'){
		$nombre=$_GET['nom'];
		//$nombre='TARJETA MADRE PRO GAMING';
		$res=R::getAll('select producto_productos,cantidad,productos.precio_productos from almacen join productos on productos.cod_producto=almacen.cod_producto where almacen.cod_producto=(select cod_producto FROM productos WHERE producto_productos="'.$nombre.'")');
		echo json_encode($res);
	}
	if($operacion=='noti'){
		$res=R::getAll('select producto_productos,cantidad from almacen join productos on productos.cod_producto=almacen.cod_producto WHERE cantidad<=5');
		echo json_encode($res);
	}
	if($operacion=='mostrarInvoice'){
		$res=R::getAll('select facturas.id,factura,fecha,nombre,nit,total,codventa FROM facturas order by facturas.id desc');
		echo json_encode($res);
	}
	if($operacion=='showbalance'){
		$nom=$_GET['nombre'];
		$res=R::getAll('select fecha_venta,nombre_cliente,item_descargo,cantidad_descargo,"salida" as estado FROM venta join descargos on descargos.cod_venta=venta.cod_venta join clientes on clientes.cod_cliente=venta.cod_cliente WHERE item_descargo="'.$nom.'" union select fechai_ad,razon_proveedor,producto_productos,cantidad_ad,"entrada" as estado FROM adquisicion join proveedores on proveedores.cod_proveedor=adquisicion.cod_proveedor join productos on productos.cod_producto=adquisicion.cod_producto WHERE producto_productos="'.$nom.'" ORDER by fecha_venta ASC');
		echo json_encode($res);
	}
	if($operacion=='Seguimiento'){
		$res=R::getAll('select tabservicios.id,fecha_servicio,fechafi,nombre_cliente,nombre_servicio FROM tabservicios join clientes on clientes.cod_cliente=tabservicios.cod_cliente ORDER BY tabservicios.id DESC');
		echo json_encode($res);
	}
	if($operacion=='showSeg'){
		$codigo=$_GET['cod'];
		$res=R::getAll('select fecha,notas FROM seguimiento WHERE codseg="'.$codigo.'"');
		echo json_encode($res);
	}
	if($operacion=='showbalance2'){
		$nom=$_GET['nombre'];
		$res=R::getAll('select fecha_venta,nombre_cliente,item_descargo,cantidad_descargo,precio_producto,"salida" as estado FROM venta join descargos on descargos.cod_venta=venta.cod_venta join clientes on clientes.cod_cliente=venta.cod_cliente WHERE item_descargo="'.$nom.'" union select fechai_ad,razon_proveedor,producto_productos,cantidad_ad,precio_ad,"entrada" as estado FROM adquisicion join proveedores on proveedores.cod_proveedor=adquisicion.cod_proveedor join productos on productos.cod_producto=adquisicion.cod_producto WHERE producto_productos="'.$nom.'" ORDER by fecha_venta ASC');
		echo json_encode($res);
	}
	function almacenmenos($ide,$cantidad){
		$encontrar=R::findOne( 'almacen', ' idproducto = ? ', [$ide] );
		$r=$encontrar->id;
		$cant=($encontrar->cantidad)-$cantidad;
		$men2="";
			$registro2=R::load('almacen',$r);
			$registro2->cantidad=$cant;
			$men2=R::store($registro2);
		return ($men2);
	}

 ?>
