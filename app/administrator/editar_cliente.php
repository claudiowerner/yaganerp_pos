<?php

	require_once '../conexion.php';
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
	$fecha_pago = $_POST["fechaPago"];
	$telefono = $_POST["telefono"];
	$id = $_POST["id"];
	
	$sql = 
	"UPDATE cliente SET 
	`nombre` = '$nombre', 
	`rut` = '$rut', 
	`nom_fantasia` = '$nom_fantasia', 
	`razon_social` = '$razon_social', 
	`direccion` = '$direccion', 
	`correo` = '$correo', 
	`telefono` = '$telefono', 
	`plan_comprado` = '$plan_comprado', 
	`fecha_pago` = '$fecha_pago', 
	`estado` = '$estado'
	WHERE id = $id;
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