<?php

	require_once '../../../conexion.php';
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);

    //obtener fecha
	$hoy = getdate();
	$fecha = $hoy['year']."-".$hoy['mon']."-".$hoy['mday'];
	
	$nombre = $_POST["nombre"];
	$estado = $_POST["estado"];
	$rut = $_POST["rut"];
	$nom_fantasia = $_POST["nomFantasia"];
	$razon_social = $_POST["razonSocial"];
	$direccion = $_POST["direccion"];
	$correo = $_POST["correo"];
	$plan_comprado = $_POST["plan"];
	$telefono = $_POST["telefono"];
	$id = $_POST["id"];
	$metodo_pago = $_POST["metodo_pago"];
	$fechaDesde = $_POST["fechaDesde"];
	$fechaHasta = $_POST["fechaHasta"];
	$estado_pago = $_POST["estado_pago"];
	
	$sql = 
	"UPDATE cliente c
	JOIN pago_cliente pg SET 
	c.nombre = '$nombre', 
	c.rut = '$rut', 
	c.nom_fantasia = '$nom_fantasia', 
	c.razon_social = '$razon_social', 
	c.direccion = '$direccion', 
	c.correo = '$correo', 
	c.telefono = '$telefono', 
	c.plan_comprado = '$plan_comprado',  
	c.estado = '$estado',

	pg.plan = '$plan_comprado',
	pg.metodo_pago = '$metodo_pago',
	pg.fecha_desde = '$fechaDesde',
	pg.fecha_hasta = '$fechaHasta',
	pg.estado = '$estado_pago'
	WHERE c.id = $id
	AND pg.id_cl = $id;
	";
	$resultado = mysqli_query($conexion, $sql);

	if($resultado)
	{
		echo "Cliente modificado correctamente";
	}
	else
	{
		echo die("Error al modificar cliente: ". mysqli_error($conexion));
	}
	
	

?>